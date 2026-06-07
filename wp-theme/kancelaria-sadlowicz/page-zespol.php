<?php get_header(); ?>

<!-- ===== PAGE HERO ===== -->
<section class="page-hero">
    <div class="page-hero-diagonal"></div>
    <div class="container">
        <div class="page-hero-eyebrow">
            <div class="page-hero-eyebrow-line"></div>
            <span class="page-hero-eyebrow-text">Kancelaria Adwokacka · Warszawa</span>
        </div>
        <h1 class="page-hero-title">Nasz <em>Zespół</em></h1>
        <p class="page-hero-desc">Doświadczeni adwokaci z indywidualnym podejściem. Łączymy rzetelną wiedzę prawną z osobistym zaangażowaniem w każdą sprawę.</p>
        <div class="page-hero-actions">
            <a href="<?php echo home_url('/kontakt/'); ?>" class="btn-gold">
                Umów konsultację
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
            <a href="<?php echo home_url('/specjalizacje/'); ?>" class="btn-ghost">Nasze specjalizacje</a>
        </div>
    </div>
</section>

<?php if (ks_use_elementor_content()): ?>
    <?php while (have_posts()): the_post(); the_content(); endwhile; ?>
<?php else: ?>

<!-- ===== FILOZOFIA KANCELARII ===== -->
<section style="padding: 64px 0; background: var(--ivory); border-bottom: 1px solid rgba(13,36,56,.07);">
    <div class="container">
        <div style="max-width: 740px;">
            <div class="page-hero-eyebrow reveal" style="margin-bottom: 14px;">
                <div class="page-hero-eyebrow-line"></div>
                <span class="page-hero-eyebrow-text">Nasza filozofia</span>
            </div>
            <p class="reveal" style="font-family: var(--ff-display); font-size: clamp(1.1rem, 2vw, 1.35rem); font-weight: 300; line-height: 1.75; color: var(--charcoal); font-style: italic; margin-bottom: 18px;">
                Wierzymy, że skuteczna pomoc prawna wymaga nie tylko wiedzy – lecz przede wszystkim zaufania, czasu poświęconego klientowi i głębokiego zrozumienia jego sytuacji.
            </p>
            <p class="reveal" style="font-family: var(--ff-body); font-size: 1rem; line-height: 1.85; color: var(--text);">
                Kancelaria skupia doświadczonych adwokatów, którzy łączą rzetelne przygotowanie merytoryczne z osobistym zaangażowaniem. Każdy klient traktowany jest indywidualnie – bez szablonowych odpowiedzi i bez zbędnej biurokracji.
            </p>
        </div>
    </div>
</section>

<!-- ===== KAMILA – FEATURED PROFILE ===== -->
<section class="team-featured" id="kamila">
    <div class="container">

        <div class="page-hero-eyebrow reveal" style="margin-bottom: 6px;">
            <div class="page-hero-eyebrow-line"></div>
            <span class="page-hero-eyebrow-text">Założycielka Kancelarii</span>
        </div>

        <div class="team-featured-inner">

            <!-- TREŚĆ -->
            <div class="team-featured-content reveal">
                <h2 class="team-name">adw. Kamila <em>Sadłowicz</em></h2>
                <span class="team-role-tag">Adwokat · Założycielka Kancelarii</span>

                <p class="team-lead">
                    Prawo to nie tylko zawód – to moje powołanie. Od początku kariery kieruję się zasadą, że każdy klient zasługuje na rzetelną, indywidualną pomoc prawną.
                </p>

                <p>
                    Wybór prawa był dla mnie decyzją przemyślaną – ale dopiero socjologia, którą studiowałam równolegle na SGGW, nauczyła mnie naprawdę słuchać. Rozumieć nie tylko przepis, ale człowieka stojącego za sprawą. Interdyscyplinarne wykształcenie (Prawo na Uniwersytecie SWPS i Socjologia na SGGW) pozwala mi łączyć precyzję prawniczą z komunikacją, która daje klientowi poczucie, że jest rozumiany – nie tylko reprezentowany.
                </p>
                <p>
                    Przez ponad 12 lat pracy na styku prawa i biznesu – od asystenta prawnego, przez aplikację adwokacką w kancelarii Jerschina-Fus, Radtke-Cichocka w Warszawie, po własną praktykę – zbudowałam doświadczenie, którego nie zastąpi żaden kurs. Prowadzę aktywny referat 150–200 spraw rocznie, reprezentując spółki, przedsiębiorców i klientów indywidualnych przed sądami wszystkich instancji. W windykacji należności osiągam ok. 80% skuteczności.
                </p>
                <p>
                    Cenię przejrzystość. Klient powinien rozumieć swoją sytuację prawną – nie tylko jej skutki, ale też strategię działania i realne szanse. Dlatego zamiast prawniczego żargonu daję konkretne opcje i uczciwą ocenę ryzyka. To podejście wypracowałam przez lata doradztwa Zarządom spółek, gdzie nie ma miejsca na niedomówienia.
                </p>

                <div class="team-spec-tags">
                    <span class="team-spec-tag">Prawo Gospodarcze</span>
                    <span class="team-spec-tag">Restrukturyzacja</span>
                    <span class="team-spec-tag">Prawo Pracy</span>
                    <span class="team-spec-tag">Windykacja</span>
                    <span class="team-spec-tag">Prawo Cywilne</span>
                    <span class="team-spec-tag">Własność Intelektualna</span>
                    <span class="team-spec-tag">Compliance</span>
                    <span class="team-spec-tag">Prawo Ubezpieczeniowe</span>
                </div>

                <div class="team-contact-row">
                    <a href="tel:+48790013287" class="team-contact-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.68A2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92v2z"/></svg>
                        +48 790 013 287
                    </a>
                    <a href="mailto:kamila.sadlowicz@kancelaria-sadlowicz.pl" class="team-contact-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        kamila.sadlowicz@kancelaria-sadlowicz.pl
                    </a>
                    <a href="https://www.linkedin.com/in/kamila-s-b20a8012a/" target="_blank" rel="noopener" class="team-contact-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
                        LinkedIn
                    </a>
                    <a href="<?php echo home_url('/o-mnie/'); ?>" class="team-contact-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        Pełna biografia →
                    </a>
                </div>

                <div class="team-signature">
                    Kamila Sadłowicz, adwokat
                </div>
            </div>

            <!-- ZDJĘCIE -->
            <div class="team-featured-photo reveal">
                <div class="team-photo-frame">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/7.jpg" alt="Adwokat Kamila Sadłowicz – Założycielka Kancelarii">
                    <div class="team-photo-accent"></div>
                </div>
                <div class="team-badge">
                    <strong>adw. Kamila Sadłowicz</strong>
                    <span>Okręgowa Rada Adwokacka w Warszawie</span>
                    <span class="team-badge-note">Nr wpisu: WAW/ADW/9453</span>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ===== STATYSTYKI ===== -->
<section class="team-stats reveal">
    <div class="container">
        <div class="team-stats-grid">
            <div class="team-stat">
                <span class="team-stat-number">12+</span>
                <span class="team-stat-label">lat doświadczenia</span>
            </div>
            <div class="team-stat">
                <span class="team-stat-number">200</span>
                <span class="team-stat-label">spraw rocznie</span>
            </div>
            <div class="team-stat">
                <span class="team-stat-number">~80%</span>
                <span class="team-stat-label">skuteczności w windykacji</span>
            </div>
            <div class="team-stat">
                <span class="team-stat-number">500+</span>
                <span class="team-stat-label">klientów obsłużonych</span>
            </div>
        </div>
    </div>
</section>

<!-- ===== WARTOŚCI (ivory) ===== -->
<section class="content-section" style="background: var(--ivory);">
    <div class="container">
        <div class="page-hero-eyebrow reveal" style="margin-bottom: 8px;">
            <div class="page-hero-eyebrow-line"></div>
            <span class="page-hero-eyebrow-text">Nasze podejście</span>
        </div>
        <h2 class="reveal" style="font-family: var(--ff-display); font-size: clamp(1.8rem,3vw,2.4rem); color: var(--navy); font-weight: 400; margin-bottom: 0;">
            Na czym nam <em style="font-style:italic;">zależy</em>
        </h2>

        <div class="values-grid">
            <div class="value-card reveal">
                <svg class="value-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                </svg>
                <h3>Rzetelność</h3>
                <p>Każda sprawa wymaga pełnego zaangażowania i dokładnej analizy. Dajemy klientowi rzetelną ocenę sytuacji – nawet jeśli nie jest to to, co chciałby usłyszeć.</p>
            </div>
            <div class="value-card reveal">
                <svg class="value-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <polyline points="12 6 12 12 16 14"/>
                </svg>
                <h3>Dostępność</h3>
                <p>Odpowiadamy na maile w ciągu 24 godzin roboczych. W sprawach prawnych czas ma kluczowe znaczenie – dlatego nie zostawiamy klientów bez odpowiedzi.</p>
            </div>
            <div class="value-card reveal">
                <svg class="value-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/>
                </svg>
                <h3>Indywidualne podejście</h3>
                <p>Każdy klient i każda sprawa jest inna. Nie stosujemy szablonowych rozwiązań – słuchamy, analizujemy i dobieramy strategię dopasowaną do konkretnej sytuacji.</p>
            </div>
        </div>
    </div>
</section>

<!-- ===== POZOSTAŁY ZESPÓŁ ===== -->
<section class="team-members-section" id="marcin">
    <div class="container">
        <div class="page-hero-eyebrow reveal" style="margin-bottom: 6px;">
            <div class="page-hero-eyebrow-line"></div>
            <span class="page-hero-eyebrow-text">Adwokaci kancelarii</span>
        </div>
        <h2 class="reveal" style="font-family: var(--ff-display); font-size: clamp(1.8rem,3vw,2.4rem); color: var(--navy); font-weight: 400; margin-bottom: 0;">
            Nasi <em style="font-style:italic;">adwokaci</em>
        </h2>
        <p class="reveal" style="margin-top: 16px; font-family: var(--ff-body); font-size: 1rem; line-height: 1.85; color: var(--text); max-width: 620px;">
            Kancelaria współpracuje z adwokatami o uzupełniających się specjalizacjach. Każdy z nich wnosi do kancelarii własne doświadczenie i ekspertyzę, dzięki czemu możemy zapewnić klientom wsparcie prawne na najwyższym poziomie.
        </p>

        <!-- Pozioma karta (solo). Gdy dojdą kolejne osoby: usuń .member-card--horizontal,
             opakuj wszystkie karty w <div class="team-cards-grid"> i użyj .member-card -->
        <div class="member-card--horizontal reveal">
            <div class="member-card-photo">
                <div class="member-photo-placeholder">
                    <span class="member-initials">M</span>
                    <span class="member-photo-note">Zdjęcie zostanie dodane</span>
                </div>
            </div>
            <div class="member-card-body">
                <span class="member-of-counsel-tag">Of Counsel</span>
                <h3 class="member-card-name">adw. Marcin <span style="color: var(--text-muted); font-size: 1rem; font-weight: 300;">[Nazwisko]</span></h3>
                <p class="member-card-title">Adwokat · Of Counsel</p>
                <p class="member-card-bio placeholder-text">[TU WSTAW: Krótki opis Marcina – doświadczenie, podejście do pracy, specjalizacja. 2–3 zdania.]</p>
                <ul class="member-card-specs">
                    <li class="placeholder-text">[Specjalizacja 1 – np. Prawo cywilne]</li>
                    <li class="placeholder-text">[Specjalizacja 2 – np. Prawo nieruchomości]</li>
                    <li class="placeholder-text">[Specjalizacja 3 – np. Prawo gospodarcze]</li>
                </ul>
                <div class="member-card-footer">
                    <a href="mailto:[email]@kancelaria-sadlowicz.pl" class="member-card-email">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        [email]@kancelaria-sadlowicz.pl
                    </a>
                </div>
            </div>
        </div>

        <!-- ── MOŻLIWOŚĆ DODANIA KOLEJNYCH OSÓB ──
             Aby dodać nowego adwokata: usuń .member-card--horizontal powyżej,
             opakuj wszystkie karty w <div class="team-cards-grid"> i użyj .member-card.
             Siatka automatycznie dostosuje liczbę kolumn dzięki auto-fill + minmax(300px, 380px).
        -->
    </div>
</section>

<!-- ===== SIEĆ WSPÓŁPRACY ===== -->
<section class="team-collab">
    <div class="container">
        <div class="team-collab-intro">
            <div class="page-hero-eyebrow reveal" style="margin-bottom: 6px;">
                <div class="page-hero-eyebrow-line"></div>
                <span class="page-hero-eyebrow-text">Sieć ekspercka</span>
            </div>
            <h2 class="reveal" style="font-family: var(--ff-display); font-size: clamp(1.8rem,3vw,2.4rem); color: var(--navy); font-weight: 400; margin-bottom: 0;">
                Szerzej niż <em style="font-style:italic;">tylko kancelaria</em>
            </h2>
            <p class="reveal">
                Kancelaria regularnie współpracuje z siecią sprawdzonych specjalistów z pokrewnych dziedzin. Dzięki temu możemy zaoferować klientom wsparcie kompleksowe – prawne, podatkowe, finansowe czy techniczne – zawsze w ramach jednej relacji opartej na zaufaniu. Dobieramy współpracowników z taką samą starannością, jaką przykładamy do doboru własnego zespołu.
            </p>
        </div>
        <div class="collab-areas">
            <div class="collab-area-card reveal">
                <h4>Doradztwo podatkowe</h4>
                <p>Współpracujemy z doradcami podatkowymi przy sprawach wymagających połączenia kompetencji prawnych i podatkowych – restrukturyzacje, transakcje M&amp;A, umowy B2B, due diligence.</p>
            </div>
            <div class="collab-area-card reveal">
                <h4>Biegli i eksperci</h4>
                <p>W sprawach wymagających opinii specjalistycznej (wyceny, analizy finansowe, ekspertyzy techniczne i medyczne) współpracujemy z zaufanymi biegłymi sądowymi i ekspertami branżowymi.</p>
            </div>
            <div class="collab-area-card reveal">
                <h4>Kancelarie zagraniczne</h4>
                <p>Obsługę spraw z elementem transgranicznym realizujemy we współpracy z partnerskimi kancelariami w wybranych jurysdykcjach Unii Europejskiej i poza nią.</p>
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
<?php endif; ?>

<?php get_footer(); ?>
