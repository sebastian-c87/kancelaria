#!/usr/bin/env python3
"""Generowanie i edycja grafik przez Gemini API (Nano Banana).

Wymaga zmiennej srodowiskowej GEMINI_API_KEY.
Tylko biblioteka standardowa - brak zaleznosci do instalacji.

Przyklady:
    # lista dostepnych modeli obrazowych
    python3 tools/genimage.py --list-models

    # generowanie ze zdjeciami referencyjnymi
    python3 tools/genimage.py \\
        --prompt-file prompt.txt \\
        --ref assets/images/7.jpg \\
        --ref /sciezka/do/koszulki.jpg \\
        --out assets/images/kamila-majorka.png
"""

import argparse
import base64
import json
import mimetypes
import os
import ssl
import sys
import urllib.error
import urllib.request

API_ROOT = "https://generativelanguage.googleapis.com/v1beta"
DEFAULT_MODEL = "gemini-3-pro-image-preview"
CA_BUNDLE = "/root/.ccr/ca-bundle.crt"


def ssl_context():
    ctx = ssl.create_default_context()
    if os.path.exists(CA_BUNDLE):
        try:
            ctx.load_verify_locations(CA_BUNDLE)
        except OSError:
            pass
    return ctx


def call_api(url, payload=None, api_key=""):
    data = json.dumps(payload).encode() if payload is not None else None
    req = urllib.request.Request(
        url,
        data=data,
        headers={
            "Content-Type": "application/json",
            "x-goog-api-key": api_key,
        },
        method="POST" if data else "GET",
    )
    try:
        with urllib.request.urlopen(req, context=ssl_context(), timeout=300) as resp:
            return json.loads(resp.read())
    except urllib.error.HTTPError as exc:
        body = exc.read().decode(errors="replace")
        sys.exit(f"Blad API {exc.code}: {body}")
    except urllib.error.URLError as exc:
        sys.exit(f"Blad polaczenia: {exc.reason}")


def list_models(api_key):
    result = call_api(f"{API_ROOT}/models?pageSize=200", api_key=api_key)
    for model in result.get("models", []):
        name = model.get("name", "").removeprefix("models/")
        methods = model.get("supportedGenerationMethods", [])
        if "image" in name and "generateContent" in methods:
            print(f"{name:45s} {model.get('displayName', '')}")


def build_parts(prompt, refs):
    parts = [{"text": prompt}]
    for path in refs:
        if not os.path.exists(path):
            sys.exit(f"Brak pliku referencyjnego: {path}")
        mime = mimetypes.guess_type(path)[0] or "image/jpeg"
        with open(path, "rb") as handle:
            parts.append(
                {
                    "inline_data": {
                        "mime_type": mime,
                        "data": base64.b64encode(handle.read()).decode(),
                    }
                }
            )
    return parts


def generate(args, api_key):
    payload = {
        "contents": [{"role": "user", "parts": build_parts(args.prompt, args.ref)}],
        "generationConfig": {"responseModalities": ["TEXT", "IMAGE"]},
    }
    if args.aspect:
        payload["generationConfig"]["imageConfig"] = {"aspectRatio": args.aspect}

    result = call_api(
        f"{API_ROOT}/models/{args.model}:generateContent", payload, api_key
    )

    candidates = result.get("candidates") or []
    if not candidates:
        sys.exit(f"Model nie zwrocil kandydata. Pelna odpowiedz:\n{json.dumps(result, indent=2)}")

    written = 0
    for part in candidates[0].get("content", {}).get("parts", []):
        if "text" in part:
            print(f"[model] {part['text'].strip()}", file=sys.stderr)
        blob = part.get("inlineData") or part.get("inline_data")
        if blob:
            out = args.out if written == 0 else _numbered(args.out, written)
            os.makedirs(os.path.dirname(os.path.abspath(out)), exist_ok=True)
            with open(out, "wb") as handle:
                handle.write(base64.b64decode(blob["data"]))
            print(out)
            written += 1

    if not written:
        reason = candidates[0].get("finishReason", "nieznany")
        sys.exit(f"Model nie zwrocil obrazu (finishReason: {reason}).")


def _numbered(path, index):
    stem, ext = os.path.splitext(path)
    return f"{stem}-{index + 1}{ext}"


def main():
    parser = argparse.ArgumentParser(description=__doc__, formatter_class=argparse.RawDescriptionHelpFormatter)
    parser.add_argument("--prompt", help="tresc promptu")
    parser.add_argument("--prompt-file", help="plik z trescia promptu")
    parser.add_argument("--ref", action="append", default=[], help="zdjecie referencyjne (mozna podac wielokrotnie)")
    parser.add_argument("--out", default="output.png", help="sciezka pliku wynikowego")
    parser.add_argument("--model", default=DEFAULT_MODEL, help=f"model (domyslnie {DEFAULT_MODEL})")
    parser.add_argument("--aspect", help="proporcje, np. 3:4 albo 9:16")
    parser.add_argument("--list-models", action="store_true", help="wypisz dostepne modele obrazowe")
    args = parser.parse_args()

    api_key = os.environ.get("GEMINI_API_KEY", "").strip()
    if not api_key:
        sys.exit("Brak GEMINI_API_KEY w zmiennych srodowiskowych.")

    if args.list_models:
        list_models(api_key)
        return

    if args.prompt_file:
        with open(args.prompt_file, encoding="utf-8") as handle:
            args.prompt = handle.read()
    if not args.prompt:
        sys.exit("Podaj --prompt albo --prompt-file.")

    generate(args, api_key)


if __name__ == "__main__":
    main()
