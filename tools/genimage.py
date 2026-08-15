#!/usr/bin/env python3
"""Generowanie i edycja grafik przez Gemini API albo Replicate.

Wymaga zmiennej srodowiskowej GEMINI_API_KEY (provider gemini)
albo REPLICATE_API_TOKEN (provider replicate).
Tylko biblioteka standardowa - brak zaleznosci do instalacji.

Przyklady:
    # lista dostepnych modeli obrazowych Gemini
    python3 tools/genimage.py --list-models

    # Gemini ze zdjeciami referencyjnymi
    python3 tools/genimage.py \\
        --prompt-file prompt.txt \\
        --ref twarz.jpg --ref koszulka.jpg \\
        --out wynik.png

    # Replicate, edycja jednego zdjecia (Flux Kontext)
    python3 tools/genimage.py --provider replicate \\
        --model black-forest-labs/flux-kontext-pro \\
        --prompt-file prompt.txt \\
        --ref bazowe.jpg \\
        --input aspect_ratio=2:3 \\
        --out wynik.png

    # Replicate, zachowanie tozsamosci twarzy (InstantID)
    python3 tools/genimage.py --provider replicate \\
        --model zsxkib/instant-id \\
        --prompt-file prompt.txt \\
        --ref twarz.jpg --image-field image \\
        --out wynik.png
"""

import argparse
import base64
import json
import mimetypes
import os
import ssl
import sys
import time
import urllib.error
import urllib.request

GEMINI_ROOT = "https://generativelanguage.googleapis.com/v1beta"
REPLICATE_ROOT = "https://api.replicate.com/v1"
DEFAULT_GEMINI_MODEL = "gemini-3-pro-image"
DEFAULT_REPLICATE_MODEL = "black-forest-labs/flux-kontext-pro"
# Pola wejsciowe na kolejne zdjecia referencyjne, gdy nie podano --image-field.
REPLICATE_IMAGE_FIELDS = ["input_image", "input_image_2", "input_image_3", "input_image_4"]
CA_BUNDLE = "/root/.ccr/ca-bundle.crt"
POLL_INTERVAL = 2
POLL_TIMEOUT = 600


def ssl_context():
    ctx = ssl.create_default_context()
    if os.path.exists(CA_BUNDLE):
        try:
            ctx.load_verify_locations(CA_BUNDLE)
        except OSError:
            pass
    return ctx


def request_json(url, payload=None, headers=None, method=None):
    data = json.dumps(payload).encode() if payload is not None else None
    req = urllib.request.Request(
        url,
        data=data,
        headers={"Content-Type": "application/json", **(headers or {})},
        method=method or ("POST" if data else "GET"),
    )
    try:
        with urllib.request.urlopen(req, context=ssl_context(), timeout=300) as resp:
            return json.loads(resp.read())
    except urllib.error.HTTPError as exc:
        sys.exit(f"Blad API {exc.code}: {exc.read().decode(errors='replace')}")
    except urllib.error.URLError as exc:
        sys.exit(f"Blad polaczenia: {exc.reason}")


def data_uri(path):
    if not os.path.exists(path):
        sys.exit(f"Brak pliku referencyjnego: {path}")
    mime = mimetypes.guess_type(path)[0] or "image/jpeg"
    with open(path, "rb") as handle:
        return f"data:{mime};base64," + base64.b64encode(handle.read()).decode()


def write_image(raw, out, index):
    path = out if index == 0 else _numbered(out, index)
    directory = os.path.dirname(os.path.abspath(path))
    os.makedirs(directory, exist_ok=True)
    with open(path, "wb") as handle:
        handle.write(raw)
    print(path)


def _numbered(path, index):
    stem, ext = os.path.splitext(path)
    return f"{stem}-{index + 1}{ext}"


# --- Gemini ---------------------------------------------------------------


def gemini_headers(api_key):
    return {"x-goog-api-key": api_key}


def gemini_list_models(api_key):
    result = request_json(f"{GEMINI_ROOT}/models?pageSize=200", headers=gemini_headers(api_key))
    for model in result.get("models", []):
        name = model.get("name", "").removeprefix("models/")
        if "generateContent" not in model.get("supportedGenerationMethods", []):
            continue
        if "image" in name or "banana" in name:
            print(f"{name:45s} {model.get('displayName', '')}")


def gemini_generate(args, api_key):
    parts = [{"text": args.prompt}]
    for path in args.ref:
        uri = data_uri(path)
        mime, b64 = uri.removeprefix("data:").split(";base64,", 1)
        parts.append({"inline_data": {"mime_type": mime, "data": b64}})

    payload = {
        "contents": [{"role": "user", "parts": parts}],
        "generationConfig": {"responseModalities": ["TEXT", "IMAGE"]},
    }
    if args.aspect:
        payload["generationConfig"]["imageConfig"] = {"aspectRatio": args.aspect}

    result = request_json(
        f"{GEMINI_ROOT}/models/{args.model or DEFAULT_GEMINI_MODEL}:generateContent",
        payload,
        gemini_headers(api_key),
    )

    candidates = result.get("candidates") or []
    if not candidates:
        sys.exit(f"Model nie zwrocil kandydata:\n{json.dumps(result, indent=2)}")

    written = 0
    for part in candidates[0].get("content", {}).get("parts", []):
        if "text" in part:
            print(f"[model] {part['text'].strip()}", file=sys.stderr)
        blob = part.get("inlineData") or part.get("inline_data")
        if blob:
            write_image(base64.b64decode(blob["data"]), args.out, written)
            written += 1

    if not written:
        sys.exit(f"Model nie zwrocil obrazu (finishReason: {candidates[0].get('finishReason', 'nieznany')}).")


# --- Replicate ------------------------------------------------------------


def replicate_headers(token):
    return {"Authorization": f"Bearer {token}"}


def parse_input_pairs(pairs):
    extra = {}
    for item in pairs:
        if "=" not in item:
            sys.exit(f"--input oczekuje formatu klucz=wartosc, dostalem: {item}")
        key, value = item.split("=", 1)
        try:
            extra[key] = json.loads(value)
        except json.JSONDecodeError:
            extra[key] = value
    return extra


def replicate_generate(args, token):
    model = args.model or DEFAULT_REPLICATE_MODEL
    fields = args.image_field or REPLICATE_IMAGE_FIELDS
    if len(args.ref) > len(fields):
        sys.exit(
            f"Podano {len(args.ref)} referencji, a tylko {len(fields)} pol wejsciowych. "
            "Uzyj --image-field, zeby nazwac pola tego modelu."
        )

    payload = {"input": {"prompt": args.prompt}}
    for path, field in zip(args.ref, fields):
        payload["input"][field] = data_uri(path)
    if args.aspect:
        payload["input"]["aspect_ratio"] = args.aspect
    payload["input"].update(parse_input_pairs(args.input))

    if ":" in model:
        owner_name, version = model.rsplit(":", 1)
        url = f"{REPLICATE_ROOT}/predictions"
        payload["version"] = version
        del owner_name
    else:
        url = f"{REPLICATE_ROOT}/models/{model}/predictions"

    prediction = request_json(url, payload, replicate_headers(token))
    prediction = replicate_wait(prediction, token)

    output = prediction.get("output")
    urls = [output] if isinstance(output, str) else list(output or [])
    if not urls:
        sys.exit(f"Model nie zwrocil obrazu. Status: {prediction.get('status')}, "
                 f"blad: {prediction.get('error')}")

    for index, item in enumerate(urls):
        req = urllib.request.Request(item)
        with urllib.request.urlopen(req, context=ssl_context(), timeout=300) as resp:
            write_image(resp.read(), args.out, index)


def replicate_wait(prediction, token):
    deadline = time.monotonic() + POLL_TIMEOUT
    while prediction.get("status") in ("starting", "processing"):
        if time.monotonic() > deadline:
            sys.exit(f"Przekroczono limit {POLL_TIMEOUT}s oczekiwania na wynik.")
        time.sleep(POLL_INTERVAL)
        get_url = prediction.get("urls", {}).get("get")
        if not get_url:
            sys.exit("Odpowiedz Replicate nie zawiera adresu do odpytania o status.")
        prediction = request_json(get_url, headers=replicate_headers(token))

    if prediction.get("status") != "succeeded":
        sys.exit(f"Predykcja zakonczona statusem {prediction.get('status')}: {prediction.get('error')}")
    if prediction.get("logs"):
        print(prediction["logs"].strip().splitlines()[-1], file=sys.stderr)
    return prediction


# --- CLI ------------------------------------------------------------------


def main():
    parser = argparse.ArgumentParser(
        description=__doc__, formatter_class=argparse.RawDescriptionHelpFormatter
    )
    parser.add_argument("--provider", choices=["gemini", "replicate"], default="gemini")
    parser.add_argument("--prompt", help="tresc promptu")
    parser.add_argument("--prompt-file", help="plik z trescia promptu")
    parser.add_argument("--ref", action="append", default=[], help="zdjecie referencyjne (wielokrotnie)")
    parser.add_argument("--image-field", action="append", help="nazwa pola wejsciowego dla kolejnej referencji (tylko replicate)")
    parser.add_argument("--input", action="append", default=[], help="dodatkowy parametr modelu klucz=wartosc (tylko replicate)")
    parser.add_argument("--out", default="output.png", help="sciezka pliku wynikowego")
    parser.add_argument("--model", help="model; domyslnie zalezy od providera")
    parser.add_argument("--aspect", help="proporcje, np. 2:3 albo 9:16")
    parser.add_argument("--list-models", action="store_true", help="wypisz modele obrazowe Gemini")
    args = parser.parse_args()

    if args.provider == "gemini":
        credential = os.environ.get("GEMINI_API_KEY", "").strip()
        if not credential:
            sys.exit("Brak GEMINI_API_KEY w zmiennych srodowiskowych.")
    else:
        credential = os.environ.get("REPLICATE_API_TOKEN", "").strip()
        if not credential:
            sys.exit("Brak REPLICATE_API_TOKEN w zmiennych srodowiskowych.")

    if args.list_models:
        gemini_list_models(credential)
        return

    if args.prompt_file:
        with open(args.prompt_file, encoding="utf-8") as handle:
            args.prompt = handle.read()
    if not args.prompt:
        sys.exit("Podaj --prompt albo --prompt-file.")

    if args.provider == "gemini":
        gemini_generate(args, credential)
    else:
        replicate_generate(args, credential)


if __name__ == "__main__":
    main()
