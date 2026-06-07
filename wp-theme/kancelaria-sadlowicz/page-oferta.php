<?php get_header(); ?>

<!-- ===== PAGE HERO ===== -->
<section class="page-hero">
    <div class="page-hero-diagonal"></div>
    <div class="container">
        <div class="page-hero-eyebrow">
            <div class="page-hero-eyebrow-line"></div>
            <span class="page-hero-eyebrow-text">Kancelaria Adwokacka · Warszawa</span>
        </div>
        <h1 class="page-hero-title">Oferta i <em>Cennik</em></h1>
        <p class="page-hero-desc">Transparentne ceny i indywidualne podejście do każdego klienta. Każda sprawa jest inna – po wstępnej konsultacji otrzymujesz szczegółową wycenę.</p>
        <div class="page-hero-actions">
            <a href="<?php echo home_url('/kontakt/'); ?>" class="btn-gold">
                Umów konsultację
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
            <a href="tel:+48790013287" class="btn-ghost">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.68A2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92v2z"/></svg>
                +48 790 013 287
            </a>
        </div>
    </div>
</section>

<?php if (ks_use_elementor_content()): ?>
    <?php while (have_posts()): the_post(); the_content(); endwhile; ?>
<?php else: ?>
    <main>
        <!-- Intro -->
        <section class="content-section" style="padding-bottom: 0;">
            <div class="container">
                <div class="intro-box">
                    <p class="lead-text">
                        Oferuję kompleksową obsługę prawną dostosowaną do potrzeb klientów indywidualnych i firm. 
                        <strong>Każda sprawa jest inna</strong>, dlatego po wstępnej konsultacji przedstawiam 
                        <strong>szczegółową wycenę</strong> dopasowaną do skali i złożoności problemu.
                    </p>
                    <p>
                        Poniższy cennik oparty jest na <strong>Rozporządzeniu Ministra Sprawiedliwości</strong> 
                        oraz <strong>praktyce rynkowej w Warszawie</strong> (stan na 2026 rok). Wszystkie kwoty podane są <strong>netto + VAT 23%</strong>.
                    </p>
                </div>
            </div>
        </section>

        <!-- 1. Konsultacje -->
        <section class="content-section" style="padding-top: 40px;">
            <div class="container">
                <h2>Konsultacje Prawne</h2>
                
                <div class="table-wrapper">
                    <table class="pricing-table">
                        <thead>
                            <tr>
                                <th>Usługa</th>
                                <th>Stawka</th>
                                <th>Uwagi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Porada prawna (60 min.) – osobiście</td>
                                <td><strong>350-500 zł</strong></td>
                                <td>Analiza sprawy, ocena szans, plan działania</td>
                            </tr>
                            <tr>
                                <td>Porada online/telefoniczna (60 min.)</td>
                                <td><strong>350 zł</strong></td>
                                <td>Wideo/telefon, materiały wysyłane mailowo</td>
                            </tr>
                            <tr>
                                <td>Porada ekspresowa (30 min.)</td>
                                <td><strong>200-300 zł</strong></td>
                                <td>Krótka konsultacja, szybka odpowiedź</td>
                            </tr>
                            <tr>
                                <td>Opinia prawna pisemna (do 5 stron A4)</td>
                                <td><strong>1.000-1.500 zł</strong></td>
                                <td>Szczegółowa analiza + pisemne rekomendacje</td>
                            </tr>
                            <tr>
                                <td>Analiza dokumentacji (za godzinę)</td>
                                <td><strong>300-400 zł</strong></td>
                                <td>Przegląd umów, pism, akt sprawy</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="info-box">
                    <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg></span>Dodatkowe informacje:</h4>
                    <ul>
                        <li>Pierwsza konsultacja zaliczana na poczet dalszej współpracy (jeśli zdecydujesz się na reprezentację)</li>
                        <li>Przygotowanie dokumentów przez klienta = maksymalne wykorzystanie czasu</li>
                        <li>Możliwość konsultacji w weekend (dodatkowa opłata +30%)</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- 2. Abonament -->
        <section class="content-section bg-light">
            <div class="container">
                <h2>Abonament Prawny dla Firm</h2>
                <p class="section-intro">Stała obsługa prawna dla Twojej firmy – doradztwo w bieżących sprawach, rabat na postępowania sądowe i priorytetowy czas odpowiedzi.</p>

                <!-- Pakiet START -->
                <div class="package-card">
                    <div class="package-header">
                        <h3>PAKIET START</h3>
                        <div class="package-price">800 zł/mc</div>
                    </div>
                    <div class="package-meta">
                        <span><strong>Dla kogo:</strong> Mikrofirmy, freelancerzy, start-upy (1-5 pracowników)</span>
                    </div>
                    <div class="package-content">
                        <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="9 12 11 14 15 10"/></svg></span>Co obejmuje pakiet:</h4>
                        <ul>
                            <li>✅ <strong>Konsultacje telefoniczne i mailowe</strong> – do 2 godzin miesięcznie</li>
                            <li>✅ <strong>Przegląd i opiniowanie do 3 umów miesięcznie</strong> (standardowych, do 5 stron)</li>
                            <li>✅ <strong>Pomoc w sporządzaniu prostych pism</strong> (odpowiedzi na reklamacje)</li>
                            <li>✅ <strong>Do 2 wezwań do zapłaty miesięcznie</strong> (prosta windykacja)</li>
                            <li>✅ <strong>1 konsultacja z zakresu prawa pracy</strong> (umowy zlecenia, B2B)</li>
                            <li>✅ <strong>Czas odpowiedzi: do 24h</strong> (dni robocze)</li>
                        </ul>
                        <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="8" y1="12" x2="16" y2="12"/></svg></span>Pakiet NIE obejmuje:</h4>
                        <ul>
                            <li>Reprezentacji sądowej (rozliczana osobno)</li>
                            <li>Sporządzania umów (tylko przegląd!)</li>
                            <li>Obsługi postępowań administracyjnych i KRS</li>
                        </ul>
                        <p class="package-extra"><strong>Dodatkowe godziny:</strong> 300 zł/h</p>
                    </div>
                </div>

                <!-- Pakiet BIZNES -->
                <div class="package-card package-recommended">
                    <div class="package-badge">★ POLECANY</div>
                    <div class="package-header">
                        <h3>PAKIET BIZNES</h3>
                        <div class="package-price">1.800 zł/mc</div>
                    </div>
                    <div class="package-meta">
                        <span><strong>Dla kogo:</strong> Małe i średnie firmy (5-25 pracowników)</span>
                    </div>
                    <div class="package-content">
                        <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="9 12 11 14 15 10"/></svg></span>Co obejmuje pakiet:</h4>
                        <ul>
                            <li>✅ <strong>Konsultacje telefoniczne i mailowe</strong> – do 4 godzin miesięcznie (odpowiedź do 12h w dni robocze)</li>
                            <li>✅ <strong>Przegląd i opiniowanie do 8 umów</strong> (do 10 stron każda)</li>
                            <li>✅ <strong>Sporządzanie do 3 umów standardowych</strong> (B2B, NDA, zlecenia, umowy o pracę)</li>
                            <li>✅ <strong>Do 5 wezwań do zapłaty miesięcznie</strong> (windykacja należności)</li>
                            <li>✅ <strong>Kompleksowe doradztwo z zakresu prawa pracy</strong> (umowy, regulaminy, zwolnienia)</li>
                            <li>✅ <strong>Reprezentacja w negocjacjach</strong> (do 2 spotkań/mc)</li>
                            <li>✅ <strong>Przegląd korespondencji prawnej</strong> (odpowiedzi na wezwania, reklamacje)</li>
                            <li>✅ <strong>Audyt prawny 1x na pół roku</strong> (compliance, RODO, umowy)</li>
                            <li>✅ <strong>Czas odpowiedzi: do 12h</strong> (dni robocze)</li>
                            <li>✅ <strong>Priorytetowy kontakt</strong> (dedykowany numer telefonu)</li>
                            <li>✅ <strong>Rabat 15% na sprawy sądowe</strong></li>
                        </ul>
                        <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="8" y1="12" x2="16" y2="12"/></svg></span>Pakiet NIE obejmuje:</h4>
                        <ul>
                            <li>Reprezentacji sądowej (rozliczana osobno z rabatem 15%)</li>
                            <li>Obsługi spraw KRS (płatne osobno z rabatem 15%)</li>
                        </ul>
                        <p class="package-extra"><strong>Dodatkowe godziny:</strong> 280 zł/h</p>
                    </div>
                </div>

                <!-- Pakiet PROFESJONALNY -->
                <div class="package-card">
                    <div class="package-header">
                        <h3>PAKIET PROFESJONALNY</h3>
                        <div class="package-price">4.200 zł/mc</div>
                    </div>
                    <div class="package-meta">
                        <span><strong>Dla kogo:</strong> Średnie i duże firmy (25-100 pracowników), spółki z zarządem</span>
                    </div>
                    <div class="package-content">
                        <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="9 12 11 14 15 10"/></svg></span>Co obejmuje pakiet:</h4>
                        <ul>
                            <li>✅ <strong>Konsultacje telefoniczne, mailowe i wideo</strong> – do 10 godzin miesięcznie (odpowiedź do 6h w dni robocze)</li>
                            <li>✅ <strong>Przegląd i opiniowanie do 15 umów</strong> (niezależnie od objętości)</li>
                            <li>✅ <strong>Sporządzanie do 5 złożonych umów</strong> (inwestycyjne, joint-venture, licencje, franchising)</li>
                            <li>✅ <strong>Do 10 wezwań do zapłaty miesięcznie</strong> (kompleksowa windykacja)</li>
                            <li>✅ <strong>Kompleksowe doradztwo z zakresu prawa pracy</strong> (zwolnienia grupowe, kontrole PIP, spory)</li>
                            <li>✅ <strong>Pełna obsługa KRS i zmian korporacyjnych</strong> (uchwały, zmiany umów spółek, raporty)</li>
                            <li>✅ <strong>Reprezentacja w negocjacjach biznesowych</strong> (do 4 spotkań/mc)</li>
                            <li>✅ <strong>Audyt prawny 2x/rok</strong> (RODO, compliance, umowy, regulaminy)</li>
                            <li>✅ <strong>Wsparcie w postępowaniach administracyjnych</strong> (UOKiK, UODO, ZUS, US)</li>
                            <li>✅ <strong>Comiesięczne raporty</strong> (podsumowanie obsługi, statystyki, rekomendacje)</li>
                            <li>✅ <strong>Czas odpowiedzi: do 6h</strong> (dni robocze)</li>
                            <li>✅ <strong>Dedykowany opiekun prawny</strong> (stały kontakt, znajomość specyfiki firmy)</li>
                            <li>✅ <strong>Rabat 20% na sprawy sądowe</strong></li>
                        </ul>
                        <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="8" y1="12" x2="16" y2="12"/></svg></span>Pakiet NIE obejmuje:</h4>
                        <ul>
                            <li>Reprezentacji sądowej w sporach o wartości powyżej 50.000 zł (rozliczana osobno z rabatem 20%)</li>
                        </ul>
                        <p class="package-extra"><strong>Dodatkowe godziny:</strong> 250 zł/h</p>
                    </div>
                </div>

                <!-- Pakiet PREMIUM -->
                <div class="package-card">
                    <div class="package-header">
                        <h3>PAKIET PREMIUM</h3>
                        <div class="package-price">od 8.000 zł/mc</div>
                    </div>
                    <div class="package-meta">
                        <span><strong>Dla kogo:</strong> Duże korporacje, spółki giełdowe, grupy kapitałowe (100+ pracowników)</span>
                    </div>
                    <div class="package-content">
                        <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="9 12 11 14 15 10"/></svg></span>Co obejmuje pakiet:</h4>
                        <ul>
                            <li>✅ <strong>Pełna obsługa prawna in-house</strong> (prawnik dedykowany wyłącznie dla klienta)</li>
                            <li>✅ <strong>Konsultacje telefoniczne, mailowe, wideo i stacjonarne</strong> – zakres ustalany indywidualnie; możliwość kontaktu w pilnych sytuacjach poza godzinami pracy</li>
                            <li>✅ <strong>Konsultacje strategiczne z zarządem</strong> (uczestnictwo w posiedzeniach zarządu)</li>
                            <li>✅ <strong>Kompleksowa obsługa korporacyjna</strong> (zmiany struktury spółek, przekształcenia, uchwały)</li>
                            <li>✅ <strong>Reprezentacja w postępowaniach sądowych</strong> (do 3 spraw jednocześnie w ramach pakietu)</li>
                            <li>✅ <strong>Kompleksowa windykacja należności</strong> w ramach pakietu (wezwania, pozwy, egzekucje)</li>
                            <li>✅ <strong>Zarządzanie ryzykiem prawnym</strong> (audyty kwartalne, compliance)</li>
                            <li>✅ <strong>Comiesięczne spotkania strategiczne</strong> (prezentacja stanu spraw, analiza ryzyka)</li>
                            <li>✅ <strong>Szkolenia wewnętrzne dla pracowników</strong> (RODO, prawo pracy, compliance – 2x/rok)</li>
                            <li>✅ <strong>Rabat 30% na wszystkie sprawy poza pakietem</strong></li>
                        </ul>
                        <p class="package-extra"><strong>Dodatkowe godziny:</strong> 220 zł/h</p>
                        <p class="package-note"><strong>Zakres negocjowalny:</strong> Możliwość stworzenia pakietu na miarę (np. tylko obsługa korporacyjna bez spraw pracowniczych)</p>
                    </div>
                </div>

                <!-- Tabela porównawcza -->
                <h3 style="margin-top: 3rem;">Porównanie Pakietów Abonamentowych</h3>
                
                <div class="table-wrapper">
                    <table class="comparison-table">
                        <thead>
                            <tr>
                                <th>Element</th>
                                <th>START</th>
                                <th>BIZNES</th>
                                <th>PROFESJONALNY</th>
                                <th>PREMIUM</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Cena/mc</strong></td>
                                <td>800 zł</td>
                                <td><strong>1.800 zł</strong></td>
                                <td>4.200 zł</td>
                                <td>od 8.000 zł</td>
                            </tr>
                            <tr>
                                <td>Konsultacje telefoniczne/mailowe</td>
                                <td>Do 2 godz./mc</td>
                                <td>Do 4 godz./mc</td>
                                <td>Do 10 godz./mc</td>
                                <td>Ustalane indywidualnie</td>
                            </tr>
                            <tr>
                                <td>Przegląd umów/mc</td>
                                <td>3 umowy</td>
                                <td>8 umów</td>
                                <td>15 umów</td>
                                <td>Wg potrzeb (ustalane z klientem)</td>
                            </tr>
                            <tr>
                                <td>Sporządzanie umów</td>
                                <td>–</td>
                                <td>Do 3/mc</td>
                                <td>Do 5/mc</td>
                                <td>Wg potrzeb (ustalane z klientem)</td>
                            </tr>
                            <tr>
                                <td>Wezwania do zapłaty</td>
                                <td>Do 2/mc</td>
                                <td>Do 5/mc</td>
                                <td>Do 10/mc</td>
                                <td>Wg potrzeb (ustalane z klientem)</td>
                            </tr>
                            <tr>
                                <td>Prawo pracy</td>
                                <td>1 konsultacja/mc</td>
                                <td>Doradztwo w bieżących sprawach pracowniczych</td>
                                <td>Kompleksowa obsługa</td>
                                <td>Pełna obsługa + szkolenia</td>
                            </tr>
                            <tr>
                                <td>Reprezentacja w negocjacjach</td>
                                <td>–</td>
                                <td>Do 2 spotkań/mc</td>
                                <td>Do 4 spotkań/mc</td>
                                <td>Wg potrzeb (ustalane z klientem)</td>
                            </tr>
                            <tr>
                                <td>Obsługa KRS</td>
                                <td>–</td>
                                <td>Płatne z rabatem 15%</td>
                                <td>✅ Zmiany, uchwały</td>
                                <td>✅ Pełna obsługa</td>
                            </tr>
                            <tr>
                                <td>Audyt prawny</td>
                                <td>–</td>
                                <td>1x/pół roku</td>
                                <td>2x/rok</td>
                                <td>4x/rok</td>
                            </tr>
                            <tr>
                                <td>Czas odpowiedzi</td>
                                <td>Do 24h</td>
                                <td>Do 12h</td>
                                <td>Do 6h</td>
                                <td>Do 2h (pilne natychmiast)</td>
                            </tr>
                            <tr>
                                <td>Rabat na sprawy sądowe</td>
                                <td>-</td>
                                <td>15%</td>
                                <td>20%</td>
                                <td>30%</td>
                            </tr>
                            <tr>
                                <td><strong>Dodatkowa godzina</strong></td>
                                <td>300 zł</td>
                                <td>280 zł</td>
                                <td>250 zł</td>
                                <td>220 zł</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="info-box" style="margin-top: 2rem;">
                    <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg></span>Dodatkowe informacje o abonamentach:</h4>
                    <ul>
                        <li>Abonament na czas nieokreślony z <strong>1-miesięcznym okresem wypowiedzenia</strong></li>
                        <li>Możliwość abonamentu na czas określony (6 lub 12 miesięcy) z <strong>rabatem 10-15%</strong></li>
                        <li>Możliwość upgrade'u pakietu w każdej chwili (różnica ceny za bieżący miesiąc)</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- 3. Sprawy Rodzinne -->
        <section class="content-section">
            <div class="container">
                <h2>Sprawy Rodzinne</h2>
                
                <div class="table-wrapper">
                    <table class="pricing-table">
                        <thead>
                            <tr>
                                <th>Element</th>
                                <th>Stawka</th>
                                <th>Uwagi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="highlight-row">
                                <td><strong>Opłata sądowa od pozwu rozwodowego</strong></td>
                                <td><strong>600 zł</strong></td>
                                <td>Stała w całej Polsce, obowiązkowa</td>
                            </tr>
                            <tr class="highlight-row">
                                <td><strong>Opłata skarbowa za pełnomocnictwo</strong></td>
                                <td><strong>17 zł</strong></td>
                                <td>Przy reprezentacji sądowej</td>
                            </tr>
                            <tr>
                                <td>Sporządzenie pozwu rozwodowego</td>
                                <td><strong>1.000-1.500 zł</strong></td>
                                <td>Zależnie od skomplikowania</td>
                            </tr>
                            <tr>
                                <td>Rozwód za porozumieniem stron (cała sprawa)</td>
                                <td><strong>3.000-3.500 zł</strong></td>
                                <td>Szybsze i tańsze, bez sporu</td>
                            </tr>
                            <tr>
                                <td>Rozwód z orzekaniem o winie (cała sprawa)</td>
                                <td><strong>8.000–15.000 zł</strong></td>
                                <td>Dłuższe postępowanie, wielokrotne rozprawy, świadkowie; cena zależy od liczby posiedzeń</td>
                            </tr>
                            <tr>
                                <td>Podział majątku wspólnego (pozew)</td>
                                <td><strong>2.000-4.000 zł</strong></td>
                                <td>Zależnie od wartości majątku</td>
                            </tr>
                            <tr>
                                <td>Ustalenie alimentów (pozew + reprezentacja)</td>
                                <td><strong>1.500-2.000 zł</strong></td>
                                <td>Prostsza sprawa</td>
                            </tr>
                            <tr>
                                <td>Zmiana wysokości alimentów</td>
                                <td><strong>1.000-1.500 zł</strong></td>
                                <td>Przy zmianie sytuacji życiowej</td>
                            </tr>
                            <tr>
                                <td>Egzekucja alimentów (komornik + reprezentacja)</td>
                                <td><strong>1.000-1.500 zł</strong></td>
                                <td>Windykacja zaległych alimentów</td>
                            </tr>
                            <tr>
                                <td>Kontakty z dzieckiem (pozew)</td>
                                <td><strong>2.000-2.500 zł</strong></td>
                                <td>Ustalenie harmonogramu kontaktów</td>
                            </tr>
                            <tr>
                                <td>Władza rodzicielska (ograniczenie/pozbawienie)</td>
                                <td><strong>2.500-4.000 zł</strong></td>
                                <td>Wymaga dowodów, często opinie psychologiczne</td>
                            </tr>
                            <tr>
                                <td>Separacja (pozew + reprezentacja)</td>
                                <td><strong>2.500-3.500 zł</strong></td>
                                <td>Podobnie jak rozwód</td>
                            </tr>
                            <tr>
                                <td>Reprezentacja na 1 rozprawie (bez pozwu)</td>
                                <td><strong>1.000-1.200 zł</strong></td>
                                <td>Jednorazowe zlecenie</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="info-box">
                    <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg></span>Minimalna stawka wg Rozporządzenia Ministra Sprawiedliwości:</h4>
                    <ul>
                        <li>Sprawy o rozwód: <strong>720 zł</strong></li>
                        <li>Sprawy o alimenty: <strong>240 zł</strong></li>
                        <li>Sprawy o podział majątku: <strong>50% stawki wg wartości udziału</strong></li>
                    </ul>
                    <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg></span>Dodatkowe usługi:</h4>
                    <ul>
                        <li>Mediacje rozwodowe – <strong>500-1.500 zł</strong> (opcjonalnie przed procesem, często skuteczniejsze)</li>
                        <li>Pomoc w sprawie alimentów za granicą (UE) – wycena indywidualna</li>
                        <li>Reprezentacja w postępowaniu apelacyjnym – <strong>+50% stawki z I instancji</strong></li>
                        <li>Koszty opinii biegłego (rodzinna/psychologiczna) – pokrywa strona na zlecenie sądu; wynagrodzenie biegłego ustala sąd</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- 4. Windykacja -->
        <section class="content-section bg-light">
            <div class="container">
                <h2>Windykacja Należności</h2>
                <p class="section-intro">Dochodzenie należności pieniężnych – od wezwania do zapłaty, przez postępowanie sądowe, po obsługę egzekucji komorniczej.</p>

                <div class="table-wrapper">
                    <table class="pricing-table">
                        <thead>
                            <tr>
                                <th>Etap / wartość należności</th>
                                <th>Honorarium stałe</th>
                                <th>Uwagi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Wezwanie do zapłaty (pozasądowe)</td>
                                <td><strong>300–700 zł</strong></td>
                                <td>Wezwanie, negocjacje, prosta windykacja (przeważnie do 3.000 zł wartości)</td>
                            </tr>
                            <tr>
                                <td>Postępowanie sądowe (do 5.000 zł)</td>
                                <td><strong>1.500–2.500 zł</strong></td>
                                <td>Postępowanie uproszczone lub EPU (nakaz zapłaty)</td>
                            </tr>
                            <tr>
                                <td>Postępowanie sądowe (5.000–20.000 zł)</td>
                                <td><strong>2.500–5.000 zł</strong></td>
                                <td>Postępowanie zwykłe (I instancja)</td>
                            </tr>
                            <tr>
                                <td>Postępowanie sądowe (20.000–100.000 zł)</td>
                                <td><strong>5.000–10.000 zł</strong></td>
                                <td>Złożone sprawy; dłuższy czas postępowania</td>
                            </tr>
                            <tr>
                                <td>Postępowanie sądowe (100.000–500.000 zł)</td>
                                <td><strong>10.000–18.000 zł</strong></td>
                                <td>Biznesowe sprawy windykacyjne; szczegółowa wycena po analizie akt</td>
                            </tr>
                            <tr>
                                <td>Powyżej 500.000 zł</td>
                                <td><strong>wycena indywidualna</strong></td>
                                <td>Wstępna ocena na konsultacji</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="info-box">
                    <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg></span>Honorarium stałe i prowizja windykacyjna</h4>
                    <p>Wynagrodzenie w sprawach windykacyjnych może składać się z dwóch elementów:</p>
                    <ul>
                        <li><strong>Honorarium stałe</strong> – wymagane zawsze, niezależnie od wyniku sprawy; obejmuje wszystkie czynności prawnika na każdym etapie; płatne zgodnie z harmonogramem ustalonym w umowie</li>
                        <li><strong>Prowizja windykacyjna (success fee)</strong> – opcjonalny element dodatkowy, uzgadniany indywidualnie; stanowi % od faktycznie odzyskanej kwoty; płatna wyłącznie po wpływie środków na konto klienta; wynosi orientacyjnie 5–15% (maleje wraz ze wzrostem wartości należności)</li>
                    </ul>
                    <p><strong>Prowizja windykacyjna jest zawsze uzupełnieniem honorarium stałego</strong> – nigdy jego zamiennikiem. Wynika to z zasad etyki adwokackiej. Szczegółowy model wynagrodzenia ustalany jest przed podpisaniem umowy.</p>

                    <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg></span>Etapy windykacji:</h4>
                    <table class="mini-table">
                        <thead>
                            <tr>
                                <th>Etap</th>
                                <th>Honorarium</th>
                                <th>Orientacyjny czas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Wezwanie do zapłaty (pozasądowe)</td>
                                <td><strong>300–700 zł</strong></td>
                                <td>3–7 dni</td>
                            </tr>
                            <tr>
                                <td>Pozew + reprezentacja w sądzie (I instancja)</td>
                                <td>Wg tabeli powyżej</td>
                                <td>kilka – kilkanaście miesięcy</td>
                            </tr>
                            <tr>
                                <td>Postępowanie egzekucyjne (komornik)</td>
                                <td><strong>800–2.000 zł</strong> (honorarium za obsługę egzekucji); opłata komornicza ok. 15% wyegzekwowanej kwoty – płaci dłużnik</td>
                                <td>kilka – kilkanaście miesięcy</td>
                            </tr>
                        </tbody>
                    </table>

                    <p style="margin-top: 1rem;"><strong>W ramach abonamentu:</strong></p>
                    <ul>
                        <li>BIZNES: do 5 wezwań do zapłaty miesięcznie w cenie pakietu</li>
                        <li>PROFESJONALNY: do 10 wezwań do zapłaty miesięcznie w cenie pakietu</li>
                        <li>PREMIUM: obsługa windykacyjna wg zakresu uzgodnionego indywidualnie</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- 5. Sprawy Karne -->
        <section class="content-section">
            <div class="container">
                <h2>Sprawy Karne – Obrona</h2>
                
                <div class="table-wrapper">
                    <table class="pricing-table">
                        <thead>
                            <tr>
                                <th>Rodzaj postępowania</th>
                                <th>Stawka</th>
                                <th>Min. stawka (Rozp. MS)</th>
                                <th>Uwagi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Przed sądem rejonowym (I instancja)</td>
                                <td><strong>2.000-3.000 zł</strong></td>
                                <td>600 zł</td>
                                <td>Zależnie od stopnia skomplikowania</td>
                            </tr>
                            <tr>
                                <td>Przed sądem okręgowym (I instancja)</td>
                                <td><strong>3.500-5.000 zł</strong></td>
                                <td>840 zł</td>
                                <td>Poważniejsze przestępstwa</td>
                            </tr>
                            <tr>
                                <td>Postępowanie apelacyjne</td>
                                <td><strong>4.000-6.000 zł</strong></td>
                                <td>960 zł</td>
                                <td>Odwołanie od wyroku</td>
                            </tr>
                            <tr>
                                <td>Postępowanie przygotowawcze (prokuratura)</td>
                                <td><strong>2.000-2.500 zł</strong></td>
                                <td>600 zł</td>
                                <td>Obecność na przesłuchaniach, analiza akt</td>
                            </tr>
                            <tr>
                                <td>Udział w jednej rozprawie (bez pozwu)</td>
                                <td><strong>1.000-1.200 zł</strong></td>
                                <td>-</td>
                                <td>Jednorazowe zlecenie</td>
                            </tr>
                            <tr>
                                <td>Sporządzenie apelacji (bez reprezentacji)</td>
                                <td><strong>2.000-2.500 zł</strong></td>
                                <td>-</td>
                                <td>Sam dokument, bez udziału w rozprawie</td>
                            </tr>
                            <tr>
                                <td>Obrona w sprawach o wykroczenia</td>
                                <td><strong>1.000 zł</strong></td>
                                <td>-</td>
                                <td>Mandaty karne, drobne sprawy</td>
                            </tr>
                            <tr>
                                <td>Obrona w sprawach gospodarczych (I instancja)</td>
                                <td><strong>5.000-10.000 zł</strong></td>
                                <td>1.200 zł</td>
                                <td>Przestępstwa skarbowe, wyłudzenia VAT</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="info-box">
                    <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg></span>Dodatkowe informacje:</h4>
                    <ul>
                        <li>Koszty opinii biegłych (psychiatryczne, grafologiczne i inne) – pokrywa strona na zlecenie sądu; wynagrodzenie biegłego ustala sąd</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- 6. Prawo Gospodarcze -->
        <section class="content-section bg-light">
            <div class="container">
                <h2>Prawo Gospodarcze i Umowy</h2>
                
                <div class="table-wrapper">
                    <table class="pricing-table">
                        <thead>
                            <tr>
                                <th>Usługa</th>
                                <th>Stawka</th>
                                <th>Uwagi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Sporządzenie umowy (standardowa, do 5 stron)</td>
                                <td><strong>800-1.200 zł</strong></td>
                                <td>B2B, zlecenia, NDA, umowy o pracę</td>
                            </tr>
                            <tr>
                                <td>Sporządzenie umowy (złożona, 5-15 stron)</td>
                                <td><strong>2.000-3.500 zł</strong></td>
                                <td>Inwestycyjne, licencje, joint-venture, franchising</td>
                            </tr>
                            <tr>
                                <td>Przegląd i opiniowanie umowy</td>
                                <td><strong>600-1.000 zł</strong></td>
                                <td>Sprawdzenie, uwagi prawne, rekomendacje zmian</td>
                            </tr>
                            <tr>
                                <td>Negocjacje umowne (za godzinę)</td>
                                <td><strong>400 zł</strong></td>
                                <td>Reprezentacja w negocjacjach biznesowych</td>
                            </tr>
                            <tr>
                                <td>Opinia prawna (do 5 stron A4)</td>
                                <td><strong>1.000-1.500 zł</strong></td>
                                <td>Analiza prawna + pisemne rekomendacje</td>
                            </tr>
                            <tr>
                                <td>Regulamin pracy/RODO/OZE</td>
                                <td><strong>1.500-2.500 zł</strong></td>
                                <td>Dostosowanie do aktualnych przepisów</td>
                            </tr>
                            <tr>
                                <td>Obsługa zmian w KRS</td>
                                <td><strong>800-1.200 zł</strong></td>
                                <td>Uchwały, zmiany umów spółek, nowi wspólnicy</td>
                            </tr>
                            <tr>
                                <td>Sporządzenie uchwał zarządu/wspólników</td>
                                <td><strong>500-700 zł</strong></td>
                                <td>Standardowe dokumenty korporacyjne</td>
                            </tr>
                            <tr>
                                <td>Reprezentacja na Zgromadzeniu Wspólników</td>
                                <td><strong>1.500-2.500 zł</strong></td>
                                <td>Obecność prawnika, wsparcie zarządu</td>
                            </tr>
                            <tr>
                                <td>Compliance i audyt RODO</td>
                                <td><strong>3.000-8.000 zł</strong></td>
                                <td>Przegląd zgodności z przepisami + raport</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="info-box">
                    <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg></span>Dodatkowe informacje:</h4>
                    <ul>
                        <li>W ramach abonamentu BIZNES/PROFESJONALNY: część usług w cenie pakietu</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- 7. Reprezentacja Sądowa -->
        <section class="content-section">
            <div class="container">
                <h2>Reprezentacja Sądowa (wg wartości sporu)</h2>
                
                <div class="table-wrapper">
                    <table class="pricing-table">
                        <thead>
                            <tr>
                                <th>Wartość przedmiotu sporu</th>
                                <th>Stawka</th>
                                <th>Min. stawka (Rozp. MS)</th>
                                <th>Zakres</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>do 2.000 zł</td>
                                <td><strong>1.500 zł</strong></td>
                                <td>180 zł</td>
                                <td>Cała sprawa (I instancja)</td>
                            </tr>
                            <tr>
                                <td>2.000-5.000 zł</td>
                                <td><strong>2.000-2.500 zł</strong></td>
                                <td>300 zł</td>
                                <td>Cała sprawa</td>
                            </tr>
                            <tr>
                                <td>5.000-10.000 zł</td>
                                <td><strong>3.000-3.500 zł</strong></td>
                                <td>600 zł</td>
                                <td>Cała sprawa</td>
                            </tr>
                            <tr>
                                <td>10.000-50.000 zł</td>
                                <td><strong>5.000-7.000 zł</strong></td>
                                <td>1.200 zł</td>
                                <td>Cała sprawa</td>
                            </tr>
                            <tr>
                                <td>50.000-200.000 zł</td>
                                <td><strong>10.000-12.000 zł</strong></td>
                                <td>3.600 zł</td>
                                <td>Cała sprawa</td>
                            </tr>
                            <tr>
                                <td>powyżej 200.000 zł</td>
                                <td><strong>indywidualnie</strong></td>
                                <td>10.800 zł</td>
                                <td>Negocjacje z klientem</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="info-box">
                    <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg></span>Zakres "cała sprawa" (I instancja):</h4>
                    <ul>
                        <li>Sporządzenie pozwu lub odpowiedzi na pozew</li>
                        <li>Udział we <strong>wszystkich</strong> rozprawach (także posiedzeniach przygotowawczych)</li>
                        <li>Sporządzanie pism procesowych (wnioski dowodowe, repliki, dupliki)</li>
                        <li>Kontakt z klientem przez cały czas trwania sprawy (mailowy/telefoniczny)</li>
                        <li>Analiza dokumentacji i przygotowanie strategii procesowej</li>
                    </ul>

                    <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="16 12 12 8 8 12"/><line x1="12" y1="16" x2="12" y2="8"/></svg></span>Reprezentacja w II instancji (apelacja):</h4>
                    <p><strong>+50% stawki z I instancji</strong></p>

                    <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg></span>Dodatkowe informacje:</h4>
                    <ul>
                        <li>Udział w jednej rozprawie (bez kompleksowej obsługi): <strong>1.000-1.200 zł</strong></li>
                        <li>W przypadku ugody sądowej: rabat 20% (sprawa kończy się szybciej)</li>
                        <li>Klienci abonamentowi: rabaty 15-30% (zależnie od pakietu)</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- 8. Opłaty sądowe -->
        <section class="content-section bg-light">
            <div class="container">
                <h2>Opłaty Sądowe i Dodatkowe</h2>
                <p class="section-intro">
                    Poniższe koszty <strong>ponosi strona</strong> niezależnie od wynagrodzenia prawnika. 
                    Są to obowiązkowe opłaty sądowe, skarbowe oraz koszty usług dodatkowych.
                </p>

                <h3>Opłaty sądowe od pozwów</h3>
                <p style="font-size:13px;color:var(--text-muted);margin-bottom:1rem;">Wg Ustawy o kosztach sądowych w sprawach cywilnych (uksc). Opłaty są stałe i jednolite dla całej Polski.</p>
                <div class="table-wrapper">
                    <table class="pricing-table">
                        <thead>
                            <tr>
                                <th>Rodzaj sprawy / wartość sporu</th>
                                <th>Opłata sądowa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Pozew rozwodowy</td>
                                <td><strong>600 zł</strong> (opłata stała, art. 26 uksc)</td>
                            </tr>
                            <tr>
                                <td>Pozew o alimenty (strona dochodząca)</td>
                                <td><strong>zwolniona z opłaty</strong> (art. 96 ust. 1 pkt 2 uksc)</td>
                            </tr>
                            <tr>
                                <td>Sprawy cywilne – do 500 zł</td>
                                <td><strong>30 zł</strong></td>
                            </tr>
                            <tr>
                                <td>Sprawy cywilne – 500–1.500 zł</td>
                                <td><strong>100 zł</strong></td>
                            </tr>
                            <tr>
                                <td>Sprawy cywilne – 1.500–4.000 zł</td>
                                <td><strong>200 zł</strong></td>
                            </tr>
                            <tr>
                                <td>Sprawy cywilne – 4.000–7.500 zł</td>
                                <td><strong>400 zł</strong></td>
                            </tr>
                            <tr>
                                <td>Sprawy cywilne – 7.500–10.000 zł</td>
                                <td><strong>500 zł</strong></td>
                            </tr>
                            <tr>
                                <td>Sprawy cywilne – 10.000–15.000 zł</td>
                                <td><strong>750 zł</strong></td>
                            </tr>
                            <tr>
                                <td>Sprawy cywilne – 15.000–20.000 zł</td>
                                <td><strong>1.000 zł</strong></td>
                            </tr>
                            <tr>
                                <td>Sprawy cywilne – powyżej 20.000 zł</td>
                                <td><strong>5% wartości sporu</strong> (max 100.000 zł)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h3 style="margin-top: 2rem;">Inne koszty</h3>
                <div class="table-wrapper">
                    <table class="pricing-table">
                        <thead>
                            <tr>
                                <th>Element</th>
                                <th>Koszt</th>
                                <th>Uwagi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Opłata skarbowa za pełnomocnictwo</td>
                                <td><strong>17 zł</strong></td>
                                <td>Obowiązkowa przy reprezentacji</td>
                            </tr>
                            <tr>
                                <td>Opinia biegłego sądowego</td>
                                <td><strong>kwotę ustala sąd</strong></td>
                                <td>Zlecana przez sąd, pokrywa strona; wysokość zależy od specjalności biegłego i zakresu opinii</td>
                            </tr>
                            <tr>
                                <td>Tłumaczenia przysięgłe</td>
                                <td><strong>wycena indywidualna</strong></td>
                                <td>Zależnie od języka, objętości i tłumacza przysięgłego; najlepiej zapytać tłumacza bezpośrednio</td>
                            </tr>
                            <tr>
                                <td>Koszty doręczeń</td>
                                <td><strong>20-50 zł/pismo</strong></td>
                                <td>Doręczenia komornicze</td>
                            </tr>
                            <tr>
                                <td>Mediacje</td>
                                <td><strong>500-1.500 zł</strong></td>
                                <td>Opcjonalnie przed procesem</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="warning-box">
                    <h4><span class="h4-icon"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg></span>Ważne:</h4>
                    <ul>
                        <li>Jeśli <strong>wygrasz sprawę</strong> – sąd może zasądzić zwrot kosztów od przeciwnika (w tym Twoje wynagrodzenie prawnika)</li>
                        <li>Jeśli <strong>przegrasz</strong> – możesz ponieść koszty przeciwnika (jego prawnik + opłaty sądowe)</li>
                        <li>Przed rozpoczęciem sprawy <strong>zawsze</strong> informuję o potencjalnych kosztach i ryzyku</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- FAQ -->
        <section class="content-section">
            <div class="container">
                <h2>Najczęściej Zadawane Pytania o Ceny</h2>

                <div class="faq-grid">
                    <div class="faq-item">
                        <h4>Dlaczego ceny są podawane w przedziałach?</h4>
                        <p>
                            Każda sprawa jest inna – wycena zależy od skomplikowania, wartości sporu, ilości dokumentów 
                            i przewidywanego czasu pracy. Po wstępnej konsultacji przedstawiam <strong>szczegółową wycenę</strong> 
                            z rozbiciem na poszczególne etapy.
                        </p>
                    </div>

                    <div class="faq-item">
                        <h4>Czy można negocjować ceny?</h4>
                        <p>
                            Tak! W przypadku <strong>długotrwałej współpracy</strong>, <strong>większej liczby spraw</strong> 
                            lub <strong>poleceń od obecnych klientów</strong> oferuję rabaty do 20%. Klienci abonamentowi 
                            mają gwarantowane rabaty 15-30%.
                        </p>
                    </div>

                    <div class="faq-item">
                        <h4>Czy mogę rozłożyć płatność na raty?</h4>
                        <p>
                            Tak, w przypadku spraw długotrwałych (rozwody, duże windykacje) możliwa płatność ratalna: 
                            <strong>zaliczka 30-50%</strong> + raty miesięczne przez czas trwania sprawy.
                        </p>
                    </div>

                    <div class="faq-item">
                        <h4>Co się stanie jeśli przegram sprawę?</h4>
                        <p>
                            Wynagrodzenie za reprezentację <strong>nie zależy</strong> od wyniku sprawy (chyba że ustaliliśmy 
                            model success fee w windykacji). Jeśli przegrasz, sąd może zasądzić <strong>zwrot kosztów przeciwnika</strong> 
                            (jego prawnik + opłaty sądowe). O tym ryzyku informuję <strong>przed</strong> rozpoczęciem sprawy 
                            i oceniam szanse powodzenia.
                        </p>
                    </div>

                    <div class="faq-item">
                        <h4>Czy konsultacja jest płatna?</h4>
                        <p>
                            Pierwsza konsultacja (60 min) – <strong>350-500 zł</strong>. Jeśli zdecydujesz się na dalszą współpracę
                            (reprezentację w sprawie), <strong>zaliczam ją na poczet wynagrodzenia</strong>. Oferuję również
                            <strong>krótką bezpłatną rozmowę wstępną</strong> (ok. 10–15 min, telefon/online) – żeby sprawdzić, czy mogę Ci pomóc, zanim zdecydujesz się na płatną konsultację.
                        </p>
                    </div>

                    <div class="faq-item">
                        <h4>Czy abonament można rozwiązać w każdej chwili?</h4>
                        <p>
                            Tak! Abonament na czas nieokreślony z <strong>1-miesięcznym okresem wypowiedzenia</strong>. 
                            Możesz też wybrać abonament na czas określony (6 lub 12 miesięcy) z <strong>rabatem 10-15%</strong>.
                        </p>
                    </div>

                    <div class="faq-item">
                        <h4>Co jeśli wykorzystam wszystkie godziny w pakiecie abonamentowym?</h4>
                        <p>
                            Możesz dokupić dodatkowe godziny w preferencyjnej stawce (zależnie od pakietu: 220-300 zł/h). 
                            Alternatywnie – niewykorzystane godziny <strong>przechodzą na następny miesiąc</strong> (max. 2 miesiące wstecz).
                        </p>
                    </div>

                    <div class="faq-item">
                        <h4>Czy wynagrodzenie obejmuje koszty sądowe?</h4>
                        <p>
                            <strong>NIE.</strong> Moje wynagrodzenie to koszt obsługi prawnej. Dodatkowo musisz pokryć: 
                            opłaty sądowe (600 zł za rozwód, 5% wartości sporu w sprawach cywilnych itd.), opinie biegłych, tłumaczenia. 
                            Zawsze informuję o <strong>pełnych kosztach</strong> przed rozpoczęciem sprawy.
                        </p>
                    </div>
                </div>
            </div>
        </section>

    </main>

<!-- ===== CTA ===== -->
<section class="cta-section">
    <div class="container">
        <div class="cta-inner reveal">
            <div class="cta-text">
                <h2>Potrzebujesz wyceny<br>dla <em>swojej sprawy?</em></h2>
                <p>Umów konsultację – omówimy Twoją sprawę i przedstawię szczegółową wycenę bez ukrytych kosztów.</p>
            </div>
            <div style="display:flex; flex-direction:column; gap:16px; align-items:flex-start; flex-shrink:0;">
                <a href="<?php echo home_url('/kontakt/'); ?>" class="btn-gold" style="white-space:nowrap;">
                    Umów konsultację
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
                <a href="tel:+48790013287" class="btn-ghost" style="white-space:nowrap;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.68A2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92v2z"/></svg>
                    +48 790 013 287
                </a>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>
