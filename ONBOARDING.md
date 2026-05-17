# Kancelaria Adwokacka Kamila Sadłowicz — Strona WWW

## O projekcie

Statyczna strona internetowa kancelarii adwokackiej **Adwokat Kamila Sadłowicz** z siedzibą w Warszawie.

- **Telefon:** +48 790 013 287
- **Email:** kamila.sadlowicz@gmail.com
- **Lokalizacja:** Warszawa
- **Specjalizacje:** prawo gospodarcze, cywilne, rodzinne, windykacja należności

## Struktura plików

```
kancelaria/
├── index.html              # Strona główna (aktualna, działająca wersja)
├── index-redesign.html     # Nowy redesign strony głównej (w trakcie prac)
├── oferta.html             # Oferta i cennik usług
├── specjalizacje.html      # Szczegółowe specjalizacje prawne
├── blog.html               # Blog prawniczy
├── faq.html                # Najczęściej zadawane pytania
├── kontakt.html            # Strona kontaktowa
├── assets/
│   └── css/
│       └── custom.css      # Style CSS dla oryginalnej wersji
├── tests_layouts/          # Testy layoutów
└── puppeteer/              # Skrypty do testowania automatycznego
```

## Design System

### Oryginalna wersja (`index.html` + `assets/css/custom.css`)
- Czcionki: **Lora** (nagłówki) + **Open Sans** (tekst)
- Styl: klasyczny, elegancki

### Redesign (`index-redesign.html`) — plik standalone z CSS inline
- Czcionki: **Cormorant Garamond** (display) + **Jost** (body)
- Paleta kolorów:
  - `--navy: #0d2438` (granatowy — główny)
  - `--navy-mid: #1a3a52`
  - `--gold: #c8a56a` (złoty — akcent)
  - `--gold-light: #dfc08e`
  - `--ivory: #f7f3ed` (tło)
  - `--cream: #ede8df`

## Jak pracować z tym projektem na mobile

Wszystkie zmiany wprowadzaj przez wklejenie odpowiedniego pliku HTML do konwersacji. Np.:
- "Zmodyfikuj sekcję hero w index-redesign.html: [wklej kod]"
- "Dodaj nowy artykuł do blog.html: [wklej kod]"

## Stan projektu (maj 2026)

- `index.html` — wersja produkcyjna, stabilna
- `index-redesign.html` — nowy design w trakcie prac, docelowo zastąpi `index.html`
- Pozostałe strony korzystają ze starego stylu (`custom.css`)

## Uwagi techniczne

- Projekt to **czysty HTML/CSS/JS** bez frameworków
- Brak backendu — pliki statyczne
- Nawigacja między stronami przez zwykłe linki HTML
- Responsywność: menu hamburger na mobile
