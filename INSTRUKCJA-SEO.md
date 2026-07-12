# INSTRUKCJA SEO (Yoast) - kancelaria-sadlowicz.pl

Cel: strona ma sie pokazywac w Google osobom szukajacym adwokata w Warszawie
(Mokotow) do spraw: rozwody/rodzinne, windykacja, obsluga firm, sprawy karne.

Zasada nadrzedna: piszemy dla ludzi, Yoast tylko pilnuje porzadku.
Zielone swiatelko to wskazowka, nie cel sam w sobie.

---

## CZESC 1: Konfiguracja jednorazowa (15 minut, robi Sebastian)

### 1.1 Nazwa i opis witryny (poza Yoast)

wp-admin -> Ustawienia -> Ogolne:
- Tytul witryny: `Adwokat Kamila Sadlowicz`
- Opis: `Kancelaria Adwokacka Warszawa Mokotow`

To wazne, bo Yoast dokleja nazwe witryny do tytulow stron.

### 1.2 Kreator konfiguracji Yoast

wp-admin -> Yoast SEO -> Ustawienia ogolne -> "Konfiguracja pierwszych krokow"
(albo baner z kreatorem):
- Czy strona reprezentuje: **Organizacja**
- Nazwa organizacji: `Kancelaria Adwokacka Kamila Sadlowicz`
- Logo: wgraj logo/zdjecie (moze byc favicon KS albo zdjecie Kamili)
- Profile spolecznosciowe: wklej link do LinkedIn Kamili

### 1.3 Wyglad wyszukiwarki (Yoast SEO -> Ustawienia)

Zakladka **Typy tresci -> Strony**:
- Szablon tytulu SEO: `Tytul strony - Nazwa witryny` (domyslny jest OK)
- Pokaz strony w wynikach wyszukiwania: TAK

Zakladka **Typy tresci -> Wpisy**: jak wyzej, TAK.

Zakladka **Zaawansowane / Archiwa** - wylacz smieci z Google:
- Archiwa autora: **wylacz** (strona jednoosobowa - to duplikat bloga)
- Archiwa dat: **wylacz**
- Strony formatow: wylacz
- Strony zalacznikow (media): ustaw **przekierowanie do samego pliku** (Yoast
  domyslnie to robi - upewnij sie, ze wlaczone)

### 1.4 Mapa strony i Google Search Console (najwazniejszy krok!)

Yoast automatycznie tworzy mape strony: `kancelaria-sadlowicz.pl/sitemap_index.xml`
(sprawdz w przegladarce, czy sie otwiera).

Zglos strone do Google:
1. Wejdz na search.google.com/search-console
2. Dodaj usluge -> "Prefiks adresu URL" -> `https://kancelaria-sadlowicz.pl`
3. Weryfikacja: wybierz "Tag HTML" -> skopiuj kod -> wklej w
   Yoast SEO -> Ustawienia -> Narzedzia dla webmasterow -> Google -> Zapisz
   -> wroc do Search Console -> "Zweryfikuj"
4. W Search Console: Mapy witryn -> wpisz `sitemap_index.xml` -> Wyslij

Bez tego Google moze tygodniami nie zauwazyc strony. Z tym - zwykle kilka dni.

### 1.5 Wizytowka Google (wazniejsze niz caly Yoast!)

Dla lokalnej kancelarii 80% klientow z Google przychodzi przez mape i wizytowke:
1. business.google.com -> Dodaj firme
2. Nazwa: `Kancelaria Adwokacka Kamila Sadlowicz`
3. Kategoria: `Adwokat` / `Kancelaria prawna`
4. Adres: ul. Arbuzowa 12, 02-747 Warszawa
5. Telefon: +48 790 013 287, strona: kancelaria-sadlowicz.pl
6. Google wysle pocztowke z kodem weryfikacyjnym na adres - trzeba wpisac kod
7. Po weryfikacji: uzupelnij godziny (pn-pt 9-17), zdjecia, opis uslug

Dane firmy (nazwa, adres, telefon) musza byc IDENTYCZNE na stronie,
w wizytowce i wszedzie indziej w internecie.

---

## CZESC 2: Ustawienia Yoast dla kazdej podstrony (gotowce)

Na kazdej stronie, pod trescia w edytorze, jest panel Yoast SEO. Uzupelniamy
trzy rzeczy: **Fraze kluczowa**, **Tytul SEO**, **Opis (meta description)**.

Jak edytowac: kliknij "Edytuj fragment" w panelu Yoast -> pola Tytul SEO i Opis.

### Start (strona glowna)

- Fraza kluczowa: `adwokat Warszawa`
- Tytul SEO: `Adwokat Warszawa Mokotow - Kancelaria Adwokacka Kamila Sadlowicz`
- Opis: `Skuteczny adwokat w Warszawie: rozwody, windykacja, obsluga firm,
  sprawy karne. 9+ lat doswiadczenia, 80% skutecznosci windykacji.
  Zadzwon: +48 790 013 287.`

### Oferta i Cennik

- Fraza kluczowa: `cennik adwokata Warszawa`
- Tytul SEO: `Cennik uslug adwokackich Warszawa - przejrzyste stawki 2026`
- Opis: `Ile kosztuje adwokat w Warszawie? Przejrzysty cennik: konsultacje
  od 350 zl, rozwody, windykacja, abonament dla firm. Bezplatna 15-min
  konsultacja wstepna.`

### Specjalizacje

- Fraza kluczowa: `adwokat prawo gospodarcze Warszawa`
- Tytul SEO: `Specjalizacje - prawo gospodarcze, rodzinne, windykacja | Adwokat Warszawa`
- Opis: `8 obszarow praktyki: prawo gospodarcze, restrukturyzacja, prawo pracy,
  windykacja, sprawy rodzinne, wlasnosc intelektualna, ubezpieczenia, compliance.`

### O mnie

- Fraza kluczowa: `adwokat Kamila Sadlowicz`
- Tytul SEO: `Adwokat Kamila Sadlowicz - doswiadczenie i podejscie do klienta`
- Opis: `Adwokat z interdyscyplinarnym wyksztalceniem (Prawo + Socjologia),
  czlonek ORA w Warszawie. Ok. 200 spraw rocznie, 80% skutecznosci windykacji.`

### FAQ

- Fraza kluczowa: `ile kosztuje adwokat`
- Tytul SEO: `FAQ - najczestsze pytania o wspolprace z adwokatem`
- Opis: `Ile kosztuje adwokat? Jak dlugo trwa sprawa sadowa? Jakie dokumenty
  przygotowac? Odpowiedzi na 30+ najczestszych pytan o wspolprace z kancelaria.`

### Kontakt

- Fraza kluczowa: `adwokat Warszawa kontakt`
- Tytul SEO: `Kontakt - umow konsultacje | Adwokat Warszawa Mokotow`
- Opis: `Umow konsultacje z adwokatem w Warszawie: tel. +48 790 013 287,
  formularz online lub AI asystent. Odpowiedz w 24h. Pierwsza konsultacja
  telefoniczna bezplatna.`

Wskazowki do wlasnych zmian:
- Tytul SEO: max ok. 60 znakow (Yoast pokazuje pasek - ma byc zielony/pomaranczowy,
  nie uciety), fraza kluczowa mozliwie na poczatku.
- Opis: 120-156 znakow, konkret + zacheta (telefon, "bezplatna konsultacja").
- Kazda strona MUSI miec inny tytul i inna fraze - nie duplikuj.

---

## CZESC 3: Wpisy na blogu (rutyna dla kazdego nowego artykulu)

1. **Fraza kluczowa**: dluga i konkretna (tzw. long tail), np.
   `ile kosztuje rozwod w Warszawie`, `jak odzyskac pieniadze od kontrahenta`,
   `e-doreczenia dla firm 2026`. Takie frazy latwiej wygrac niz "adwokat".
2. **Tytul wpisu**: zawiera fraze, najlepiej na poczatku, obiecuje odpowiedz:
   "Ile kosztuje rozwod w Warszawie? Pelne koszty 2026".
3. **Opis meta**: streszczenie + zacheta do klikniecia.
4. **Pierwszy akapit**: fraza kluczowa powinna pasc naturalnie w 1-2 zdaniu.
5. **Naglowki H2/H3**: dziel tekst, czesc naglowkow niech odpowiada na pytania
   (Google lubi wyciagac takie fragmenty).
6. **Linkowanie wewnetrzne** (bardzo wazne): w kazdym wpisie daj 2-3 linki do
   podstron - np. przy cenach linkuj do /oferta/, na koncu do /kontakt/.
   Yoast pokaze ostrzezenie, jesli zapomnisz.
7. **Kategoria**: przypisz jedna sensowna (np. Prawo rodzinne, Windykacja).
8. Swiatelko Yoast: celuj w zielone/pomaranczowe. Nie psuj naturalnego jezyka,
   zeby zadowolic robota - czytelnosc dla klienta jest wazniejsza.

Tempo: 1-2 sensowne wpisy miesiecznie daja wiecej niz 10 slabych raz na rok.

---

## CZESC 4: Czego NIE robic

- Nie upychaj frazy kluczowej na sile ("adwokat Warszawa adwokat rozwod
  Warszawa adwokat...") - Google to karze.
- Nie kopiuj tekstow z innych stron/kancelarii - duplikaty nie rankuja.
- Nie zmieniaj adresow (slugow) istniejacych stron bez potrzeby - jesli musisz,
  Yoast Premium robi przekierowania, w wersji darmowej trzeba dodac recznie.
- Nie przejmuj sie czerwonym swiatelkiem na stronie Kontakt czy podstronach
  technicznych - one nie musza rankowac na frazy.
- Nie instaluj drugiej wtyczki SEO obok Yoast (konflikt duplikuje meta tagi).

---

## CZESC 5: Rutyna kontrolna (raz w miesiacu, 10 minut)

1. Google Search Console -> Skutecznosc: na jakie frazy ludzie wchodza,
   ktore strony rosna.
2. Search Console -> Indeksowanie stron: czy nie ma bledow (404, wykluczone).
3. Wygoogluj `site:kancelaria-sadlowicz.pl` - czy Google widzi wszystkie strony
   i czy tytuly/opisy wygladaja tak, jak ustawiles.
4. Wizytowka Google: odpowiadaj na opinie, dodawaj zdjecia.

Najwiekszy wplyw na pozycje kancelarii lokalnej maja (w kolejnosci):
wizytowka Google + opinie klientow > tresc strony (konkretna, lokalna)
> regularny blog > wszystko inne.
