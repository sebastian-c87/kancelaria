<?php get_header(); ?>

<!-- ===== PAGE HERO ===== -->
<section class="page-hero">
    <div class="page-hero-diagonal"></div>
    <div class="container">
        <div class="page-hero-eyebrow">
            <div class="page-hero-eyebrow-line"></div>
            <span class="page-hero-eyebrow-text">Adwokat · Kancelaria Adwokacka · Warszawa</span>
        </div>
        <h1 class="page-hero-title">O <em>mnie</em></h1>
        <p class="page-hero-desc">Adwokat z pasją do prawa i zaangażowaniem w każdą sprawę. Poznaj mnie bliżej – moje doświadczenie, wartości i podejście do klienta.</p>
        <div class="page-hero-actions">
            <a href="<?php echo home_url('/kontakt/'); ?>" class="btn-gold">
                Umów konsultację
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
            <a href="<?php echo home_url('/specjalizacje/'); ?>" class="btn-ghost">Moje specjalizacje</a>
        </div>
    </div>
</section>

<!-- ===== INTRO: ZDJĘCIE + BIO ===== -->
<section class="content-section">
    <div class="container">
        <div class="about-intro">

            <!-- TEKST BIO -->
            <div class="about-text reveal">
                <p class="lead-paragraph">
                    Prawo to nie tylko zawód – to moje powołanie. Od początku kariery kieruję się zasadą, że każdy klient zasługuje na rzetelną, indywidualną pomoc prawną.
                </p>

                <p>
                    Wybór prawa był dla mnie decyzją przemyślaną – ale dopiero socjologia, którą studiowałam równolegle na SGGW, nauczyła mnie naprawdę słuchać. Rozumieć nie tylko przepis, ale człowieka stojącego za sprawą. Interdyscyplinarne wykształcenie (Prawo na Uniwersytecie SWPS i Socjologia na SGGW) pozwala mi łączyć precyzję prawniczą z komunikacją, która daje klientowi poczucie, że jest rozumiany – nie tylko reprezentowany.
                </p>

                <p>
                    Przez ponad 12 lat pracy na styku prawa i biznesu – od asystenta prawnego, przez aplikację adwokacką w kancelarii Jerschina-Fus, Radtke-Cichocka w Warszawie, po własną praktykę – zbudowałam doświadczenie, którego nie zastąpi żaden kurs. Prowadzę aktywny referat 150–200 spraw rocznie, reprezentując spółki, przedsiębiorców i klientów indywidualnych przed sądami wszystkich instancji. W windykacji należności osiągam ok. 80% skuteczności – zarówno w sprawach indywidualnych, jak i masowych.
                </p>

                <p>
                    Cenię przejrzystość. Klient powinien rozumieć swoją sytuację prawną – nie tylko jej skutki, ale też strategię działania i realne szanse. Dlatego zanim wyślę pierwsze pismo, tłumaczę. Zamiast prawniczego żargonu – konkretne opcje i uczciwa ocena ryzyka. To podejście wypracowałam przez lata doradztwa Zarządom spółek, gdzie nie ma miejsca na niedomówienia i gdzie stawką jest zawsze więcej niż jedna sprawa.
                </p>

                <div class="signature">
                    Kamila Sadłowicz, adwokat
                </div>
            </div>

            <!-- ZDJĘCIE -->
            <div class="about-photo-block reveal">
                <div class="about-photo-frame">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/7.jpg" alt="Adwokat Kamila Sadłowicz">
                    <div class="about-photo-accent"></div>
                </div>
                <div class="about-badge">
                    <strong>adw. Kamila Sadłowicz</strong>
                    <span>Okręgowa Rada Adwokacka w Warszawie</span>
                    <span style="margin-top:4px; color: rgba(247,243,237,.5); font-size:12px;">Nr wpisu: WAW/ADW/9453</span>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ===== STATYSTYKI ===== -->
<section class="about-stats reveal">
    <div class="container">
        <div class="about-stats-grid">
            <div class="about-stat">
                <span class="about-stat-number">12+</span>
                <span class="about-stat-label">lat doświadczenia</span>
            </div>
            <div class="about-stat">
                <span class="about-stat-number">200</span>
                <span class="about-stat-label">spraw rocznie</span>
            </div>
            <div class="about-stat">
                <span class="about-stat-number">~80%</span>
                <span class="about-stat-label">skuteczności w windykacji</span>
            </div>
            <div class="about-stat">
                <span class="about-stat-number">500+</span>
                <span class="about-stat-label">klientów obsłużonych</span>
            </div>
        </div>
    </div>
</section>

<!-- ===== MOJE WARTOŚCI ===== -->
<section class="content-section" style="background: var(--ivory);">
    <div class="container">
        <div class="page-hero-eyebrow" style="margin-bottom: 8px;">
            <div class="page-hero-eyebrow-line"></div>
            <span class="page-hero-eyebrow-text">Moje podejście</span>
        </div>
        <h2 style="font-family: var(--ff-display); font-size: clamp(1.8rem,3vw,2.4rem); color: var(--navy); font-weight: 400; margin-bottom: 0;">
            Na czym mi <em>zależy</em>
        </h2>

        <div class="values-grid">
            <div class="value-card reveal">
                <svg class="value-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                </svg>
                <h3>Rzetelność</h3>
                <p>
                    Każda sprawa wymaga pełnego zaangażowania i dokładnej analizy. Daję Ci rzetelną ocenę sytuacji – nawet jeśli nie jest to to, co chciałbyś usłyszeć.
                </p>
            </div>
            <div class="value-card reveal">
                <svg class="value-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <polyline points="12 6 12 12 16 14"/>
                </svg>
                <h3>Dostępność</h3>
                <p>
                    Odpowiadam na maile w ciągu 24 godzin roboczych. Wiem, że w sprawach prawnych czas często ma kluczowe znaczenie – dlatego nie zostawiam klientów bez odpowiedzi.
                </p>
            </div>
            <div class="value-card reveal">
                <svg class="value-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>
                </svg>
                <h3>Indywidualne podejście</h3>
                <p>
                    Każdy klient i każda sprawa jest inna. Nie stosuję szablonowych rozwiązań – słucham, analizuję i dobieram strategię dopasowaną do Twojej konkretnej sytuacji.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ===== WYKSZTAŁCENIE I DOŚWIADCZENIE ===== -->
<section class="content-section">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 64px;">

            <!-- WYKSZTAŁCENIE -->
            <div class="reveal">
                <div class="page-hero-eyebrow" style="margin-bottom: 8px;">
                    <div class="page-hero-eyebrow-line"></div>
                    <span class="page-hero-eyebrow-text">Edukacja</span>
                </div>
                <h2 style="font-family: var(--ff-display); font-size: clamp(1.5rem,2.5vw,2rem); color: var(--navy); font-weight: 400; margin-bottom: 0;">
                    Wykształcenie
                </h2>
                <div class="timeline">
                    <div class="timeline-item">
                        <span class="timeline-year">2020</span>
                        <h4>Egzamin adwokacki – wynik pozytywny</h4>
                        <p>Okręgowa Rada Adwokacka w Warszawie · wpis nr WAW/ADW/9453</p>
                    </div>
                    <div class="timeline-item">
                        <span class="timeline-year">2017 – 2019</span>
                        <h4>Aplikacja adwokacka</h4>
                        <p>ORA w Warszawie · starosta grupy aplikacyjnej · Samorząd Aplikantów Adwokackich</p>
                    </div>
                    <div class="timeline-item">
                        <span class="timeline-year">2011 – 2014</span>
                        <h4>Magister prawa</h4>
                        <p>Uniwersytet SWPS, Warszawa</p>
                    </div>
                    <div class="timeline-item">
                        <span class="timeline-year">2008 – 2010</span>
                        <h4>Magister socjologii</h4>
                        <p>SGGW, Warszawa · spec. Komunikowanie społeczne i doradztwo</p>
                    </div>
                </div>
            </div>

            <!-- DOŚWIADCZENIE -->
            <div class="reveal">
                <div class="page-hero-eyebrow" style="margin-bottom: 8px;">
                    <div class="page-hero-eyebrow-line"></div>
                    <span class="page-hero-eyebrow-text">Kariera</span>
                </div>
                <h2 style="font-family: var(--ff-display); font-size: clamp(1.5rem,2.5vw,2rem); color: var(--navy); font-weight: 400; margin-bottom: 0;">
                    Doświadczenie
                </h2>
                <div class="timeline">
                    <div class="timeline-item">
                        <span class="timeline-year">2020 – dziś</span>
                        <h4>Kancelaria Adwokacka Kamila Sadłowicz</h4>
                        <p>Samodzielna praktyka · 150–200 spraw rocznie · prawo gospodarcze, cywilne, pracy, windykacja, restrukturyzacja · sądy wszystkich instancji</p>
                    </div>
                    <div class="timeline-item">
                        <span class="timeline-year">2017 – 2020</span>
                        <h4>Aplikant adwokacki – Jerschina-Fus, Radtke-Cichocka Sp. J.</h4>
                        <p>Warszawa · obsługa branży ochrony i automotive · pisma procesowe, zastępstwa sądowe, koncesje MSWiA i ABW</p>
                    </div>
                    <div class="timeline-item">
                        <span class="timeline-year">2011 – 2013</span>
                        <h4>Asystent prawny – PROFESSIO Kancelaria Prawnicza / Saturn TFI S.A.</h4>
                        <p>Warszawa · pisma procesowe w sprawach cywilnych i pracowniczych · zarządzanie sekretariatem kancelarii</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ===== CZŁONKOSTWA I CERTYFIKATY ===== -->
<section class="content-section" style="background: var(--ivory); padding-top: 56px; padding-bottom: 56px;">
    <div class="container">
        <div class="page-hero-eyebrow" style="margin-bottom: 8px;">
            <div class="page-hero-eyebrow-line"></div>
            <span class="page-hero-eyebrow-text">Przynależność zawodowa</span>
        </div>
        <h2 style="font-family: var(--ff-display); font-size: clamp(1.5rem,2.5vw,2rem); color: var(--navy); font-weight: 400; margin-bottom: 32px;">
            Członkostwa i <em>uprawnienia</em>
        </h2>
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
            <div class="info-box" style="margin: 0;">
                <h4>Okręgowa Rada Adwokacka w Warszawie</h4>
                <p>Adwokat wpisana na listę adwokatów ORA w Warszawie od 2020 r.</p>
                <p style="margin-top: 8px; font-size: .875rem; color: var(--text-muted);">Nr wpisu: WAW/ADW/9453 · <a href="https://www.rejestradwokatow.pl/adwokat/sadowicz-kamila-32972" target="_blank" rel="noopener" style="color: var(--navy);">Weryfikacja w rejestrze →</a></p>
            </div>
            <div class="info-box" style="margin: 0;">
                <h4>Samorząd Aplikantów Adwokackich</h4>
                <p>Członek Samorządu Aplikantów Adwokackich ORA Warszawa przez cały okres aplikacji (2017–2019) · starosta grupy aplikacyjnej</p>
            </div>
            <div class="info-box" style="margin: 0;">
                <h4>Certyfikaty i szkolenia</h4>
                <p>Certyfikat AML – obowiązki instytucji obowiązanych (GIIF) · Ochrona Zarządu przed egzekucją (PTPiGR)</p>
            </div>
        </div>
    </div>
</section>

<!-- ===== CTA ===== -->
<section class="cta-section">
    <div class="container">
        <div class="cta-inner reveal">
            <div class="cta-text">
                <h2>Porozmawiajmy<br>o Twojej <em>sprawie</em></h2>
                <p>Pierwsza konsultacja pozwoli nam ocenić sytuację i ustalić najlepszą strategię działania.</p>
            </div>
            <div style="display:flex; flex-direction:column; gap:16px; align-items:flex-start;">
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
    </div>
</section>

<?php get_footer(); ?>
