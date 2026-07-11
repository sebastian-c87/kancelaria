# PLAN: Migracja strony kancelarii na w pelni edytowalny WordPress

Data: 2026-07-11 · Branch: `claude/update-subpages-design-AYjTU` · Hosting docelowy: home.pl (serwer2684968, WordPress w `/autoinstalator/wordpressplugins/`)

## 1. Cel

Cala strona (Start, Oferta i Cennik, Specjalizacje, O mnie, Blog, FAQ, Kontakt) ma byc edytowalna
w WordPressie przez osobe nietechniczna (Kamile): klikasz w tekst i piszesz, przeciagasz sekcje
("klocki") w gore/dol, dodajesz nowe sekcje z gotowych wzorcow. Bez dotykania kodu, bez FTP.

## 2. Dlaczego poprzednie podejscie nie dzialalo i dlaczego to zadziala

Problem na home.pl: `max_input_vars = 1000` (nie da sie podniesc dla `/wp-admin`).
Klasyczny edytor (TinyMCE) + pola ACF wysylaly formularz POST z ponad setka pol na
`wp-admin/post.php` - PHP ucinal pola, WordPress gubil `action=editpost` i wyrzucal na "Wpisy".

Nowa architektura omija to CALKOWICIE:

- **Edytor blokowy (Gutenberg) zapisuje przez REST API** - jeden request JSON z kilkoma polami,
  a nie formularz z setka pol. `max_input_vars` przestaje miec znaczenie.
- **Zero ACF** - cala tresc mieszka w `post_content` jako bloki. Nie ma dziesiatek pol meta.
- REST API wchodzi przez `index.php` w katalogu glownym, gdzie `php.ini` juz podniosl limity
  (potwierdzone przez phpinfo: local 5000).

## 3. Architektura motywu `kancelaria-sadlowicz`

Motyw klasyczny (hybrydowy) - swiadomy kompromis dla osoby nietechnicznej:

| Element | Gdzie mieszka | Kto edytuje |
|---|---|---|
| Gorny pasek (tel/mail/adres), menu, stopka | Szablony PHP motywu | Sebastian (rzadko sie zmienia; Kamila nie moze tego zepsuc) |
| CALA tresc kazdej podstrony (hero, sekcje, cenniki, FAQ...) | Bloki w tresci strony | Kamila w edytorze blokowym |
| Wpisy na blogu | Natywne wpisy WP | Kamila (Wpisy -> Dodaj nowy) |
| Chatbot AI | Wzorzec blokowy + `chatbot.php` w korzeniu WP | Sebastian (klucz API) |

Struktura plikow:

```
wp-theme/kancelaria-sadlowicz/
├── style.css               # naglowek motywu
├── theme.json              # paleta (navy/gold/ivory), fonty, odstepy - widoczne w edytorze
├── functions.php           # enqueue, wsparcie motywu, auto-setup przy aktywacji
├── inc/setup-content.php   # tworzy strony/wpisy/menu przy PIERWSZEJ aktywacji
├── header.php / footer.php # top-bar, navbar, stopka, CTA
├── index.php, page.php     # strona = sam content (bloki)
├── home.php, single.php    # blog: lista wpisow + pojedynczy wpis
├── patterns/               # wzorce blokowe (auto-rejestrowane przez WP z tego folderu)
│   ├── strona-start.php, strona-oferta.php, strona-specjalizacje.php,
│   ├── strona-o-mnie.php, strona-faq.php, strona-kontakt.php
│   └── sekcja-*.php        # pojedyncze sekcje do wstawiania (CTA, cennik, FAQ itd.)
└── assets/
    ├── css/main.css        # design system wyciagniety z index-redesign.html
    ├── css/blocks.css      # style sekcji blokowych (podstrony)
    ├── css/editor.css      # zeby edytor wygladal jak strona
    └── js/main.js, chat.js # menu mobilne, reveal, chatbot (fetch do /chatbot.php)
```

Zasady tresci blokowej:
- Tekst ZAWSZE w blokach core (naglowek, akapit, lista, przycisk) - edycja przez klikniecie.
- Uklad przez `wp:group` / `wp:columns` z klasami CSS designu - sekcje przesuwalne jako calosc.
- FAQ jako bloki `wp:details` (rozwijane pytania) - dodanie pytania = duplikacja bloku.
- Dekoracje (ukosne tlo hero, linie) robi CSS po klasie - Kamila ich nie ruszy przypadkiem.
- W calym projekcie tylko zwykly myslnik "-", nigdy dlugie myslniki.

## 4. Auto-setup przy aktywacji (kluczowe ulatwienie)

Przy pierwszej aktywacji motyw sam (bez importow, bez wklejania!):
1. Tworzy strony: Start, Oferta i Cennik, Specjalizacje, O mnie, FAQ, Kontakt, Blog -
   kazda wypelniona trescia z wzorca (server-side `wp_insert_post`, zadnego limitu pol).
2. Ustawia Start jako strone glowna, Blog jako strone wpisow.
3. Tworzy menu glowne i przypina je do lokalizacji w motywie.
4. Tworzy wpisy na blogu z dotychczasowych artykulow.
5. NIE nadpisuje niczego, jesli strony juz istnieja (bezpieczna reaktywacja).

## 5. Etapy pracy (kolejnosc wykonania)

1. [x] Ten plan.
2. Szkielet motywu: CSS (ekstrakcja z index-redesign.html + style podstron), theme.json,
   functions.php, szablony PHP, JS. -> commit
3. Wzorce blokowe stron: Start, Kontakt (z chatbotem), Oferta, Specjalizacje, FAQ, O mnie. -> commit po kazdej
4. Blog: szablony + konwersja artykulow z blog.html na wpisy. -> commit
5. inc/setup-content.php (auto-tworzenie) + test skladni PHP (php -l). -> commit
6. INSTRUKCJA-WDROZENIA.md + ZIP motywu do pobrania. -> commit + push

## 6. Wdrozenie na home.pl (skrot; pelna wersja w INSTRUKCJA-WDROZENIA.md)

1. Pobierz `kancelaria-sadlowicz.zip` z repo.
2. wp-admin -> Wyglad -> Motywy -> Dodaj -> Wyslij motyw -> ZIP -> Zainstaluj -> Aktywuj.
3. Motyw sam tworzy strony i menu. Sprawdz: Strony -> Oferta i Cennik -> Edytuj -> zapisz probnie.
4. Ustawienia -> Bezposrednie odnosniki -> "Nazwa wpisu".
5. `chatbot.php` (z kluczem API) do katalogu glownego WP - juz przygotowany w repo.
6. Wtyczki zbedne dla motywu (Elementor, ACF) moga zostac wylaczone.

## 7. Jak Kamila edytuje (do przekazania klientce)

- Zmiana tekstu: Strony -> [strona] -> Edytuj -> kliknij w tekst -> pisz -> Aktualizuj.
- Przesuniecie sekcji: kliknij sekcje -> strzalki gora/dol na pasku narzedzi (lub przeciagnij).
- Nowa sekcja: niebieski "+" -> Wzorce -> kategoria "Kancelaria" -> wybierz gotowy klocek.
- Nowy wpis na blogu: Wpisy -> Dodaj nowy.
- Nowe pytanie FAQ: kliknij istniejace pytanie -> menu bloku -> Duplikuj -> zmien tresc.
