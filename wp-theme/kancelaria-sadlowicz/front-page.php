<?php get_header(); ?>

<!-- ===== HERO ===== -->
<section class="hero">
    <div class="hero-diagonal"></div>
    <div class="container">
        <div class="hero-layout">
            <div class="hero-content">
                <div class="hero-eyebrow">
                    <div class="hero-eyebrow-line"></div>
                    <span class="hero-eyebrow-text">Kancelaria Adwokacka · Warszawa</span>
                </div>
                <h1 class="hero-title">
                    Kamila<br>
                    <em>Sadłowicz</em>
                </h1>
                <p class="hero-subtitle">Adwokat · Okręgowa Rada Adwokacka w Warszawie</p>
                <p class="hero-desc">
                    Profesjonalna obsługa prawna oparta na <strong>rzetelności i skuteczności</strong>.<br>
                    Prawo gospodarcze · Prawo cywilne · Prawo rodzinne · Windykacja należności
                </p>
                <div class="hero-actions">
                    <a href="<?php echo home_url('/kontakt/'); ?>" class="btn-gold">
                        Umów konsultację
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </a>
                    <a href="<?php echo home_url('/oferta/'); ?>" class="btn-ghost">
                        Zobacz ofertę
                    </a>
                </div>
            </div>

            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number" data-target="9">9+</span>
                    <span class="stat-label">lat doświadczenia</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">80%</span>
                    <span class="stat-label">skuteczność windykacji</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">200+</span>
                    <span class="stat-label">spraw rocznie</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== QUICK LINKS ===== -->
<div class="quicklinks">
    <div class="quicklinks-inner">
        <div class="quicklinks-grid">
            <a href="<?php echo home_url('/oferta/'); ?>" class="ql-item">
                <svg class="ql-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>
                <span class="ql-label">Oferta i Cennik</span>
                <span class="ql-sub">Sprawdź stawki</span>
            </a>
            <a href="<?php echo home_url('/specjalizacje/'); ?>" class="ql-item">
                <svg class="ql-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                <span class="ql-label">Specjalizacje</span>
                <span class="ql-sub">Obszary praktyki</span>
            </a>
            <a href="<?php echo home_url('/o-mnie/'); ?>" class="ql-item">
                <svg class="ql-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                <span class="ql-label">O mnie</span>
                <span class="ql-sub">Doświadczenie</span>
            </a>
            <a href="<?php echo home_url('/blog/'); ?>" class="ql-item">
                <svg class="ql-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                <span class="ql-label">Blog Prawny</span>
                <span class="ql-sub">Artykuły i porady</span>
            </a>
            <a href="<?php echo home_url('/faq/'); ?>" class="ql-item">
                <svg class="ql-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                <span class="ql-label">FAQ</span>
                <span class="ql-sub">Pytania i odpowiedzi</span>
            </a>
            <a href="<?php echo home_url('/kontakt/'); ?>" class="ql-item ql-primary">
                <svg class="ql-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                <span class="ql-label">Kontakt</span>
                <span class="ql-sub">Umów konsultację</span>
            </a>
        </div>
    </div>
</div>

<!-- ===== O MNIE ===== -->
<section class="section" id="o-mnie">
    <div class="container">
        <div class="about-layout">
            <div class="about-text reveal">
                <div class="section-label">
                    <div class="section-label-line"></div>
                    <span class="section-label-text">O mnie</span>
                </div>
                <h2 class="section-title">Adwokat z pasją<br>do <em>skuteczności</em></h2>
                <div class="gold-rule"></div>
                <p>
                    Jestem adwokatem z interdyscyplinarnym wykształceniem - Socjologia i Prawo - oraz wieloletnią praktyką w obsłudze podmiotów gospodarczych i klientów indywidualnych. To połączenie pozwala mi rozumieć sprawy nie tylko od strony prawnej, ale też ludzkiej.
                </p>
                <p>
                    Specjalizuję się w prawie cywilnym, gospodarczym i prawie pracy. Łączę wiedzę procesową z biegłością w narzędziach IT, co pozwala mi <strong>efektywnie zarządzać ok. 200 sprawami rocznie</strong>. Skutecznie prowadzę windykację (ok. <strong>80% skuteczności</strong>) i doradzam Zarządom w zakresie corporate governance.
                </p>
                <p>
                    Moje podejście opiera się na <strong>indywidualnym traktowaniu każdego klienta</strong> i głębokiej analizie dokumentacji - wierzę, że sukces wymaga pełnego zrozumienia sytuacji klienta, zarówno faktycznej, jak i emocjonalnej.
                </p>
                <a href="<?php echo home_url('/o-mnie/'); ?>" class="btn-navy mt-8" style="display:inline-flex;">
                    Poznaj mnie bliżej
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
            </div>
            <div class="about-photo-wrap reveal" style="transition-delay:.15s">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/7.jpg" alt="Adwokat Kamila Sadłowicz">
            </div>
        </div>
    </div>
</section>

<!-- ===== JAKIM JESTEM ADWOKATEM ===== -->
<section class="section section-legal-bg">
    <div class="container">
        <div class="text-center reveal">
            <div class="section-label" style="justify-content:center;">
                <div class="section-label-line"></div>
                <span class="section-label-text">Moje podejście</span>
                <div class="section-label-line"></div>
            </div>
            <h2 class="section-title">Jakim jestem <em>adwokatem</em></h2>
            <p class="section-intro" style="margin: 0 auto;">
                Rzetelność, komunikacja i skuteczność - to fundamenty mojej pracy. Każdą sprawę traktuję indywidualnie, dbając o to, by klient rozumiał każdy etap postępowania.
            </p>
        </div>

        <div class="pillars-grid">
            <div class="pillar-card reveal">
                <div class="pillar-number">01</div>
                <svg class="pillar-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                <h3 class="pillar-title">Wnikliwa analiza dokumentacji</h3>
                <p class="pillar-text">Dokładnie badam każdy dokument, umowę, dowód - nie pomijam żadnych szczegółów. Często pozornie drobne elementy okazują się kluczowe dla sukcesu sprawy.</p>
            </div>
            <div class="pillar-card reveal" style="transition-delay:.08s">
                <div class="pillar-number">02</div>
                <svg class="pillar-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <h3 class="pillar-title">Poszukiwanie wszystkich rozwiązań</h3>
                <p class="pillar-text">Analizuję pełne spektrum dostępnych ścieżek - od negocjacji i mediacji, przez postępowanie polubowne, aż po drogę sądową. Wybieramy najkorzystniejszą strategię razem.</p>
            </div>
            <div class="pillar-card reveal" style="transition-delay:.16s">
                <div class="pillar-number">03</div>
                <svg class="pillar-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
                <h3 class="pillar-title">Transparentność i jasna komunikacja</h3>
                <p class="pillar-text">Unikam prawniczego żargonu - tłumaczę sprawy jasnym, zrozumiałym językiem. Regularnie informuję o postępach, wyjaśniam możliwe scenariusze i ich konsekwencje.</p>
            </div>
            <div class="pillar-card reveal" style="transition-delay:.24s">
                <div class="pillar-number">04</div>
                <svg class="pillar-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>
                <h3 class="pillar-title">Empatia i zrozumienie</h3>
                <p class="pillar-text">Wykształcenie socjologiczne pomaga mi rozumieć nie tylko fakty, ale i emocje klientów. Sprawy prawne wiążą się ze stresem - staram się być nie tylko prawnikiem, ale i wsparciem.</p>
            </div>
            <div class="pillar-card reveal" style="transition-delay:.32s">
                <div class="pillar-number">05</div>
                <svg class="pillar-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/></svg>
                <h3 class="pillar-title">Zaangażowanie i dbałość o szczegóły</h3>
                <p class="pillar-text">Każdej sprawie poświęcam pełną uwagę - niezależnie od wartości czy złożoności. Terminowość i skrupulatność to dla mnie standardy, nie wyjątki.</p>
            </div>
            <div class="pillar-card reveal" style="transition-delay:.4s">
                <div class="pillar-number">06</div>
                <svg class="pillar-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                <h3 class="pillar-title">Nowoczesne technologie i AI</h3>
                <p class="pillar-text">Wykorzystuję zaawansowane narzędzia cyfrowe i sztuczną inteligencję do analizy dokumentacji i researchu prawnego - oferuję usługi najwyższej jakości przy konkurencyjnych stawkach.</p>
            </div>
        </div>
    </div>
</section>

<!-- ===== SPECJALIZACJE ===== -->
<section class="section">
    <div class="container">
        <div class="reveal">
            <div class="section-label">
                <div class="section-label-line"></div>
                <span class="section-label-text">Obszary praktyki</span>
            </div>
            <h2 class="section-title">Specjalizacje</h2>
            <p class="section-intro">Kompleksowa pomoc prawna w kluczowych obszarach prawa - dla firm i klientów indywidualnych.</p>
        </div>

        <div class="spec-grid">
            <a href="<?php echo home_url('/specjalizacje/'); ?>" class="spec-card reveal">
                <div class="spec-img-wrap"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/11.png" alt="Prawo Gospodarcze" class="spec-img"></div>
                <div class="spec-body">
                    <h3 class="spec-title">Prawo Gospodarcze</h3>
                    <p class="spec-desc">Obsługa spółek, doradztwo dla zarządów, KSH</p>
                    <span class="spec-arrow">Dowiedz się więcej →</span>
                </div>
            </a>
            <a href="<?php echo home_url('/specjalizacje/'); ?>" class="spec-card reveal" style="transition-delay:.06s">
                <div class="spec-img-wrap"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/12.png" alt="Restrukturyzacja" class="spec-img"></div>
                <div class="spec-body">
                    <h3 class="spec-title">Restrukturyzacja</h3>
                    <p class="spec-desc">Postępowania upadłościowe i restrukturyzacyjne</p>
                    <span class="spec-arrow">Dowiedz się więcej →</span>
                </div>
            </a>
            <a href="<?php echo home_url('/specjalizacje/'); ?>" class="spec-card reveal" style="transition-delay:.12s">
                <div class="spec-img-wrap"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/13.png" alt="Prawo Pracy" class="spec-img"></div>
                <div class="spec-body">
                    <h3 class="spec-title">Prawo Pracy</h3>
                    <p class="spec-desc">Spory pracownicze, rozwiązywanie umów, mobbing</p>
                    <span class="spec-arrow">Dowiedz się więcej →</span>
                </div>
            </a>
            <a href="<?php echo home_url('/specjalizacje/'); ?>" class="spec-card reveal" style="transition-delay:.18s">
                <div class="spec-img-wrap"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/28.png" alt="Windykacja Należności" class="spec-img"></div>
                <div class="spec-body">
                    <h3 class="spec-title">Windykacja Należności</h3>
                    <p class="spec-desc">Skuteczne odzyskiwanie należności (80% skuteczność)</p>
                    <span class="spec-arrow">Dowiedz się więcej →</span>
                </div>
            </a>
            <a href="<?php echo home_url('/specjalizacje/'); ?>" class="spec-card reveal" style="transition-delay:.24s">
                <div class="spec-img-wrap"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/29a.png" alt="Prawo Cywilne i Rodzinne" class="spec-img"></div>
                <div class="spec-body">
                    <h3 class="spec-title">Prawo Cywilne i Rodzinne</h3>
                    <p class="spec-desc">Rozwody, alimenty, spadki, odszkodowania</p>
                    <span class="spec-arrow">Dowiedz się więcej →</span>
                </div>
            </a>
            <a href="<?php echo home_url('/specjalizacje/'); ?>" class="spec-card reveal" style="transition-delay:.3s">
                <div class="spec-img-wrap"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/16.png" alt="Prawo Własności Intelektualnej" class="spec-img"></div>
                <div class="spec-body">
                    <h3 class="spec-title">Prawo Własności Intelektualnej</h3>
                    <p class="spec-desc">Ochrona praw autorskich, w tym w zakresie AI</p>
                    <span class="spec-arrow">Dowiedz się więcej →</span>
                </div>
            </a>
            <a href="<?php echo home_url('/specjalizacje/'); ?>" class="spec-card reveal" style="transition-delay:.36s">
                <div class="spec-img-wrap"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/31a.png" alt="Prawo Ubezpieczeniowe" class="spec-img"></div>
                <div class="spec-body">
                    <h3 class="spec-title">Prawo Ubezpieczeniowe</h3>
                    <p class="spec-desc">Dochodzenie roszczeń z polis ubezpieczeniowych</p>
                    <span class="spec-arrow">Dowiedz się więcej →</span>
                </div>
            </a>
            <a href="<?php echo home_url('/specjalizacje/'); ?>" class="spec-card reveal" style="transition-delay:.42s">
                <div class="spec-img-wrap"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/21a.png" alt="Compliance i Audyt Prawny" class="spec-img"></div>
                <div class="spec-body">
                    <h3 class="spec-title">Compliance i Audyt Prawny</h3>
                    <p class="spec-desc">Regulaminy, umowy, polityki RODO</p>
                    <span class="spec-arrow">Dowiedz się więcej →</span>
                </div>
            </a>
        </div>

        <div class="text-center mt-12 reveal">
            <a href="<?php echo home_url('/specjalizacje/'); ?>" class="btn-navy" style="display:inline-flex;">
                Wszystkie specjalizacje
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- ===== OFERTA ===== -->
<section class="section section-alt">
    <div class="container">
        <div class="reveal">
            <div class="section-label">
                <div class="section-label-line"></div>
                <span class="section-label-text">Cennik</span>
            </div>
            <h2 class="section-title">Oferta i <em>Cennik</em></h2>
            <p class="section-intro">Transparentne ceny i indywidualne podejście do każdego klienta.</p>
        </div>

        <div class="offer-grid reveal">
            <div class="offer-card">
                <h3 class="offer-title">Porady Prawne</h3>
                <p class="offer-price">od 350 zł</p>
                <p class="offer-desc">Pierwsza konsultacja i szczegółowa analiza Twojej sprawy</p>
            </div>
            <div class="offer-card">
                <h3 class="offer-title">Reprezentacja Sądowa</h3>
                <p class="offer-price">wycena indywidualna</p>
                <p class="offer-desc">Skuteczna obrona Twoich interesów przed sądem</p>
            </div>
            <div class="offer-card highlighted">
                <span class="offer-badge">Polecane dla firm</span>
                <h3 class="offer-title">Abonament Prawny</h3>
                <p class="offer-price">od 1.000 zł / mc</p>
                <p class="offer-desc">Kompleksowa, stała obsługa prawna dla przedsiębiorców</p>
            </div>
            <div class="offer-card">
                <h3 class="offer-title">Windykacja Należności</h3>
                <p class="offer-price">success fee lub stawka stała</p>
                <p class="offer-desc">Model rozliczenia dopasowany do specyfiki sprawy</p>
            </div>
            <div class="offer-card">
                <h3 class="offer-title">Sprawy Rodzinne</h3>
                <p class="offer-price">od 1.000 zł</p>
                <p class="offer-desc">Rozwody, alimenty, podział majątku</p>
            </div>
            <div class="offer-card">
                <h3 class="offer-title">Doradztwo Dla Przedsiębiorców</h3>
                <p class="offer-price">od 800 zł</p>
                <p class="offer-desc">Umowy, sprawy korporacyjne, prawo pracy</p>
            </div>
        </div>

        <p class="offer-note reveal" style="margin-top:32px;">
            Każda sprawa jest inna, dlatego zapraszam do kontaktu w celu omówienia szczegółów i przygotowania indywidualnej wyceny dopasowanej do Twoich potrzeb.
        </p>

        <div class="text-center mt-12 reveal">
            <a href="<?php echo home_url('/oferta/'); ?>" class="btn-navy" style="display:inline-flex;">
                Pełna oferta i cennik
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- ===== DLACZEGO JA ===== -->
<section class="section">
    <div class="container">
        <div class="benefits-layout">
            <div class="benefits-visual reveal">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/2.png" alt="Kancelaria Adwokacka Kamila Sadłowicz">
                <div class="benefits-visual-badge">
                    <strong>9+</strong>
                    <span>lat doświad&shy;czenia</span>
                </div>
            </div>
            <div class="reveal" style="transition-delay:.12s">
                <div class="section-label">
                    <div class="section-label-line"></div>
                    <span class="section-label-text">Dlaczego warto</span>
                </div>
                <h2 class="section-title">Dlaczego warto ze mną <em>współpracować</em></h2>
                <div class="gold-rule"></div>
                <div class="benefits-list">
                    <div class="benefit-row">
                        <svg class="benefit-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        <span class="benefit-text">Ponad 9 lat doświadczenia w zawodzie prawniczym</span>
                    </div>
                    <div class="benefit-row">
                        <svg class="benefit-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        <span class="benefit-text">80% skuteczność w windykacji należności</span>
                    </div>
                    <div class="benefit-row">
                        <svg class="benefit-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        <span class="benefit-text">Kompleksowa obsługa - od analizy do finalizacji sprawy</span>
                    </div>
                    <div class="benefit-row">
                        <svg class="benefit-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        <span class="benefit-text">Indywidualne podejście i pełne zaangażowanie</span>
                    </div>
                    <div class="benefit-row">
                        <svg class="benefit-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        <span class="benefit-text">Transparentne ceny i jasna komunikacja bez żargonu</span>
                    </div>
                    <div class="benefit-row">
                        <svg class="benefit-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        <span class="benefit-text">Biegłość w systemach sądowych i nowoczesnych narzędziach IT</span>
                    </div>
                    <div class="benefit-row">
                        <svg class="benefit-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        <span class="benefit-text">Interdyscyplinarne wykształcenie: Prawo + Socjologia</span>
                    </div>
                    <div class="benefit-row">
                        <svg class="benefit-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        <span class="benefit-text">Edukacja prawna klientów - uczę, jak unikać problemów w przyszłości</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== BLOG ===== -->
<section class="section section-alt">
    <div class="container">
        <div class="reveal" style="display:flex; align-items:flex-end; justify-content:space-between; flex-wrap:wrap; gap:20px; margin-bottom:0;">
            <div>
                <div class="section-label">
                    <div class="section-label-line"></div>
                    <span class="section-label-text">Blog Prawny</span>
                </div>
                <h2 class="section-title">Najnowsze <em>wpisy</em></h2>
            </div>
            <a href="<?php echo home_url('/blog/'); ?>" class="btn-navy" style="display:inline-flex; margin-bottom:8px;">
                Wszystkie wpisy
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
        </div>

        <div class="blog-grid">
            <?php
            $recent_posts = new WP_Query([
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'post_status'    => 'publish',
            ]);

            if ($recent_posts->have_posts()):
                $delay = 0.05;
                while ($recent_posts->have_posts()):
                    $recent_posts->the_post();
                    $cats = get_the_category();
                    $cat_name = $cats ? esc_html($cats[0]->name) : 'Artykuł';
            ?>
            <article class="blog-card reveal" style="transition-delay:<?php echo $delay; ?>s">
                <div class="blog-meta">
                    <span class="blog-date"><?php echo get_the_date('d.m.Y'); ?></span>
                    <span class="blog-cat"><?php echo $cat_name; ?></span>
                </div>
                <h3 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p class="blog-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                <a href="<?php the_permalink(); ?>" class="blog-link">Czytaj więcej</a>
            </article>
            <?php
                    $delay += 0.07;
                endwhile;
                wp_reset_postdata();
            else:
            ?>
            <article class="blog-card reveal" style="transition-delay:.05s">
                <div class="blog-meta">
                    <span class="blog-date">15.01.2026</span>
                    <span class="blog-cat">Porada</span>
                </div>
                <h3 class="blog-title"><a href="<?php echo home_url('/blog/'); ?>">Jak przygotować się do pierwszej konsultacji prawnej?</a></h3>
                <p class="blog-excerpt">Pierwsza wizyta u adwokata może budzić obawy. Dowiedz się, jakie dokumenty przygotować i na co zwrócić uwagę...</p>
                <a href="<?php echo home_url('/blog/'); ?>" class="blog-link">Czytaj więcej</a>
            </article>
            <article class="blog-card reveal" style="transition-delay:.12s">
                <div class="blog-meta">
                    <span class="blog-date">22.01.2026</span>
                    <span class="blog-cat">Rodzinne</span>
                </div>
                <h3 class="blog-title"><a href="<?php echo home_url('/blog/'); ?>">Rozwód krok po kroku - praktyczny przewodnik</a></h3>
                <p class="blog-excerpt">Procedura rozwodowa może być skomplikowana. Przedstawiam kolejne etapy postępowania rozwodowego w Polsce...</p>
                <a href="<?php echo home_url('/blog/'); ?>" class="blog-link">Czytaj więcej</a>
            </article>
            <article class="blog-card reveal" style="transition-delay:.19s">
                <div class="blog-meta">
                    <span class="blog-date">29.01.2026</span>
                    <span class="blog-cat">Windykacja</span>
                </div>
                <h3 class="blog-title"><a href="<?php echo home_url('/blog/'); ?>">Windykacja należności - kiedy i jak skutecznie działać?</a></h3>
                <p class="blog-excerpt">Niesolidny kontrahent nie płaci? Poznaj skuteczne metody windykacji polubownej i sądowej...</p>
                <a href="<?php echo home_url('/blog/'); ?>" class="blog-link">Czytaj więcej</a>
            </article>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- ===== CTA ===== -->
<section class="cta-section">
    <div class="container">
        <div class="cta-inner reveal">
            <div class="cta-text">
                <h2>Potrzebujesz pomocy<br><em>prawnej?</em></h2>
                <p>Umów się na konsultację - omówimy Twoją sprawę szczegółowo i znajdziemy najlepsze rozwiązanie.</p>
            </div>
            <div style="display:flex; flex-direction:column; gap:16px; align-items:flex-start; flex-shrink:0;">
                <a href="<?php echo home_url('/kontakt/'); ?>" class="btn-gold" style="white-space:nowrap;">
                    Umów konsultację teraz
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

<?php get_footer(); ?>
