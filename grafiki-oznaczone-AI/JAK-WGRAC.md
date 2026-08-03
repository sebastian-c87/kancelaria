# Grafiki oznaczone jako AI - jak wgrac na serwer

Folder zawiera **15 grafik** z oznaczeniem AI (widoczna etykieta + metadane maszynowe).
Nazwy plikow sa **identyczne** z obecnymi na serwerze - wystarczy podmienic.

**UWAGA: nie ma tu pliku `7.jpg`** (zdjecie adw. Kamili Sadlowicz). To autentyczna
fotografia, ktorej NIE wolno oznaczac jako AI. Zostawiamy ja na serwerze bez zmian.

---

## Podmiana grafik (Menedzer plikow home.pl)

1. Zaloguj sie do panelu home.pl -> Menedzer plikow.
2. Przejdz do katalogu motywu:
   `/public_html/autoinstalator/wordpressplugins/wp-content/themes/kancelaria-sadlowicz/assets/images/`
   (jesli masz zagniezdzony folder, sciezka konczy sie
   `.../kancelaria-sadlowicz/kancelaria-sadlowicz/assets/images/`)
3. Wgraj wszystkie 15 plikow z tego folderu, potwierdzajac **nadpisanie** istniejacych.
4. Wejdz na strone i odswiez przez **Ctrl+F5** (przegladarka trzyma stare obrazki w cache).
5. Sprawdz Start i Specjalizacje - w prawym dolnym rogu kazdej grafiki powinna byc
   etykieta "Wygenerowane przez AI".

Zdjecie Kamili (`7.jpg`) zostaje nietkniete - ma pozostac bez etykiety.

---

## Nota na stronie (uzupelnienie oznaczen)

Art. 50 ust. 5 AI Act wymaga, by ujawnienie bylo jasne i wyrazne. Etykiety na grafikach
to spelniaja, ale warto dodac krotka note ogolna. Dwie opcje:

### Opcja A: w Polityce prywatnosci (prosciej)

Strony -> Polityka Prywatnosci -> Edytuj -> dodaj na koncu nowy naglowek i akapit:

**Naglowek (H2):** `Wykorzystanie sztucznej inteligencji`

**Tekst:**

> Czesc grafik ilustracyjnych zamieszczonych na tej stronie zostala wygenerowana przy
> uzyciu narzedzi sztucznej inteligencji (AI). Grafiki takie sa oznaczone widoczna
> etykieta "Wygenerowane przez AI" oraz zawieraja odpowiednie metadane. Fotografie
> przedstawiajace adw. Kamile Sadlowicz sa autentyczne i nie byly generowane ani
> modyfikowane przez AI.
>
> Na stronie kontaktowej dziala asystent AI - rozmowa prowadzona jest z systemem
> sztucznej inteligencji, nie z czlowiekiem. Asystent udziela wylacznie informacji
> ogolnych i nie zastepuje porady prawnej.
>
> Oznaczenia stosujemy zgodnie z art. 50 rozporzadzenia Parlamentu Europejskiego i Rady
> (UE) 2024/1689 (akt w sprawie sztucznej inteligencji).

### Opcja B: dodatkowo w stopce (bardziej widoczne)

Jesli chcesz miec to widoczne na kazdej podstronie, daj znac - dopisze jedna linijke
w stopce motywu (`footer.php`), np. przy informacji o prawach autorskich:
"Czesc grafik wygenerowano przy uzyciu AI".

---

## Co zawieraja oznaczone pliki

**Widoczne:** etykieta "Wygenerowane przez AI" w prawym dolnym rogu - granatowa pastylka
ze zlota obwodka, spojna z kolorystyka strony.

**Niewidoczne (metadane w pliku):**
- XMP `Iptc4xmpExt:DigitalSourceType` = `trainedAlgorithmicMedia`
  (miedzynarodowy standard IPTC oznaczania tresci AI - odczytywany przez wyszukiwarki
  i narzedzia weryfikacji tresci)
- EXIF `ImageDescription`, `Software`, `UserComment` z informacja o pochodzeniu grafiki
  i podstawie prawnej oznaczenia

Rozmiary plikow praktycznie bez zmian (43-122 KB), wiec szybkosc strony nie ucierpi.

---

## Grafika `25.jpg` - dodatkowa uwaga

To wizualizacja recepcji z logo "KS" i napisem "Kancelaria Adwokacka Adwokat KAMILA
SADLOWICZ" na scianie. Oznaczenie AI zalatwia obowiazek z AI Act, ale grafika nadal
pokazuje **fikcyjne wnetrze jako siedzibe kancelarii**. Klient moze oczekiwac takiego
wnetrza przychodzac na ul. Arbuzowa 12.

Rekomendacja: rozwazyc zastapienie jej zdjeciem rzeczywistego biura albo grafika
neutralna (bez logo i nazwy kancelarii na scianie). Szczegoly w `ANALIZA-AI-ACT-GRAFIKI.md`.
