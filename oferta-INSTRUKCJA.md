# Oferta na blokach Gutenberga - instrukcja

Teraz treść strony "Oferta" możesz mieć **w treści strony** (post_content), więc:
- widzi ją Google i Yoast,
- edytujesz ją normalnie w edytorze,
- dodajesz / usuwasz / przeciągasz sekcje natywnie (bez wtyczek).

## Krok 0 (jednorazowo) - wgraj zmiany motywu

Wgraj na staging zmienione pliki motywu (z tego repo):
- `functions.php`
- `page-oferta.php`
- `assets/css/subpages.css`

Dopóki tego nie zrobisz - albo dopóki nie wkleisz treści (krok 1) - strona Oferta
wygląda jak dotychczas (stary układ zostaje jako zabezpieczenie, nic nie znika).

## Krok 1 (jednorazowo) - wklej gotową treść do strony

1. WP Admin -> Strony -> **Oferta** -> Edytuj.
2. W prawym górnym rogu kliknij menu **trzy kropki** (Opcje) -> **Edytor kodu**
   (Code editor).
3. Zaznacz wszystko (Ctrl+A), usuń.
4. Otwórz plik `oferta-bloki.html` z repo, skopiuj **całą** zawartość i wklej.
5. Kliknij **Wyjdź z edytora kodu** (Exit code editor) - zobaczysz gotowe bloki.
6. Kliknij **Aktualizuj**.

Gotowe. Od tej chwili treść Oferty jest w stronie, a Google/Yoast ją widzą.

## Codzienna edycja (Kamila)

- **Edycja tekstu** - klikasz w tekst i piszesz.
- **Usunięcie sekcji** - klikasz blok -> trzy kropki -> Usuń.
- **Zmiana kolejności** - łapiesz blok i przeciągasz (strzałki gora/dol lub uchwyt
  z lewej), albo Lista widoku (ikona "Widok listy" u góry) i tam przeciągasz.
- **Dodanie nowej sekcji** - klikasz **+** -> zakładka **Wzorce** -> kategoria
  **"Kancelaria - sekcje"** -> wybierasz: tabela cennika, info-box, ostrzeżenie,
  karta pakietu albo FAQ. Wstawia się gotowa, ostylowana sekcja do wypełnienia.

## Style pojedynczych bloków

Zaznacz blok grupy lub akapit -> panel po prawej -> sekcja **Styl**:
- Akapit: "Wyrozniony (kursywa)" = duży, złoty cytat wstępny.
- Grupa: "Info-box (szara ramka)", "Ramka ostrzezenia", "Karta pakietu",
  "Ramka wstepu".

## Ważne (myślniki)

W treści używaj zawsze zwykłego myślnika `-`. Nie wklejaj długich `–` ani `—`.
