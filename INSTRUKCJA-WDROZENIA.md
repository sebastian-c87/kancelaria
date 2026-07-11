# INSTRUKCJA WDROZENIA - motyw WordPress "Kancelaria Sadlowicz"

Dotyczy: kancelaria-sadlowicz.pl (home.pl, WordPress w `/autoinstalator/wordpressplugins/`).
Czas wdrozenia: ok. 15 minut. Nie ruszamy bazy danych, FTP niepotrzebne.

## Co dostajesz

Po aktywacji motywu WSZYSTKO tworzy sie samo:
- strony Start, Oferta i Cennik, Specjalizacje, O mnie, FAQ, Kontakt, Blog - juz wypelnione trescia,
- menu glowne podpiete do nawigacji,
- strona glowna i strona bloga ustawione,
- 4 artykuly na blogu (przeniesione z dotychczasowej strony),
- ladne adresy (/oferta/, /kontakt/ itd.).

Kazda strona jest w 100% edytowalna w edytorze blokowym: klikasz w tekst i piszesz,
sekcje przesuwasz strzalkami lub przeciagasz, nowe sekcje wstawiasz z wzorcow "Kancelaria".

## KROK 1: Pobierz paczke motywu

W repo: `kancelaria-sadlowicz.zip` (gotowy plik). Pobierz go na dysk.

## KROK 2: Zainstaluj motyw

1. Zaloguj sie do wp-admin na kancelaria-sadlowicz.pl.
2. Wyglad -> Motywy -> przycisk "Dodaj motyw" -> "Wyslij motyw".
3. Wybierz plik `kancelaria-sadlowicz.zip` -> "Zainstaluj".
4. Po instalacji kliknij "Aktywuj".

Moment aktywacji uruchamia auto-setup (strony, menu, wpisy, ustawienia).
Jesli jakas strona o danym adresie juz istnieje - motyw jej NIE nadpisze
(bezpiecznie mozna aktywowac ponownie).

WAZNE: jesli wczesniej istnieja stare strony ("Oferta" itp. z ACF/Elementora),
auto-setup i tak utworzy komplet nowych TYLKO wtedy, gdy adresy (slugi) sa wolne.
Najlepiej PRZED aktywacja przeniesc stare strony do kosza:
Strony -> zaznacz wszystkie -> Dzialania zbiorowe -> Przenies do kosza
(kosz mozna oproznic po sprawdzeniu, ze nowa wersja dziala).

## KROK 3: Sprawdz zapis (test kluczowy!)

1. Strony -> "Oferta i Cennik" -> Edytuj.
2. Zmien dowolne slowo -> "Aktualizuj".
3. Powinno pokazac "Strona zaktualizowana" i zostac w edytorze.

Dlaczego teraz dziala, a wczesniej nie: edytor blokowy zapisuje przez REST API
(jeden request JSON), a nie formularzem z setka pol jak stary edytor + ACF.
Limit max_input_vars home.pl przestaje miec znaczenie.

## KROK 4: Chatbot AI (jednorazowo)

1. Plik `chatbot.php` z repo: otworz i w linii `define('OPENAI_API_KEY', ...)`
   wklej swoj klucz OpenAI. Sprawdz tez nazwe modelu (`OPENAI_MODEL`).
2. Wgraj `chatbot.php` do katalogu glownego WordPressa (tam gdzie wp-config.php)
   przez Menedzer plikow home.pl.
3. Wejdz na /kontakt/ i zadaj botowi pytanie testowe.

## KROK 5: Formularz kontaktowy

Formularz wysyla na `/wyslij.php` (istniejacy plik na serwerze). Jesli go nie ma
w katalogu glownym WordPressa - daj znac, przygotuje go.

## KROK 6: Porzadki (opcjonalnie, ale warto)

- Wtyczki -> dezaktywuj: Elementor (jesli wrocil), Advanced Custom Fields,
  Classic Editor (jesli jest). Motyw ich nie potrzebuje.
- Ustawienia -> Bezposrednie odnosniki -> upewnij sie, ze wybrane "Nazwa wpisu"
  (auto-setup ustawia to sam, to tylko kontrola).
- Usun z katalogu glownego pliki testowe, jesli zostaly (np. test123.php).

## Jak Kamila edytuje strony (sciaga dla klientki)

- **Zmiana tekstu**: Strony -> wybierz strone -> Edytuj -> kliknij w tekst -> pisz -> Aktualizuj.
- **Przesuniecie sekcji**: kliknij sekcje (lub wybierz ja w widoku listy - ikona
  trzech kresek w lewym gornym rogu edytora) -> strzalki gora/dol na pasku narzedzi.
- **Nowa sekcja**: niebieski "+" w lewym gornym rogu -> zakladka "Wzorce" ->
  kategoria "Kancelaria" -> kliknij gotowy klocek.
- **Nowe pytanie w FAQ**: kliknij istniejace pytanie -> trzy kropki na pasku ->
  "Duplikuj" -> zmien tresc pytania i odpowiedzi.
- **Nowy wpis na blogu**: Wpisy -> Dodaj nowy -> tytul + tresc -> Opublikuj.
  Wpis sam pojawi sie na stronie Blog i w "Najnowszych wpisach" na Starcie.
- **Zmiana zdjecia**: kliknij zdjecie -> "Zamien" -> wgraj nowe.
- **Kolory i czcionki**: pasek boczny bloku -> zakladka "Style" - paleta kancelarii
  (granat, zloto, kosc sloniowa) jest wbudowana w wybieraczke kolorow.

Czego Kamila NIE zepsuje: gorny pasek z telefonem, menu i stopka sa czescia motywu -
nie da sie ich przypadkiem skasowac z poziomu edycji strony. Zmiany w nich robi
Sebastian w plikach motywu (header.php / footer.php).

## Rozwiazywanie problemow

- **Brak stylow po aktywacji**: odswiez strone z Ctrl+F5 (cache przegladarki).
- **Menu pokazuje stare pozycje**: Wyglad -> Menu -> wybierz "Menu glowne" ->
  ustaw jako "Menu glowne" (lokalizacja) -> Zapisz.
- **Strona glowna nie jest Startem**: Ustawienia -> Czytanie -> "Strona statyczna" ->
  strona glowna: Start, strona wpisow: Blog.
- **404 na podstronach**: Ustawienia -> Bezposrednie odnosniki -> Zapisz zmiany
  (to odswieza reguly linkow).
- **Chatbot odpowiada bledem**: sprawdz klucz API i nazwe modelu w chatbot.php.
