<?php
/**
 * Title: Strona: Start (cala tresc)
 * Slug: kancelaria-sadlowicz/strona-start
 * Categories: kancelaria
 * Description: Kompletna strona glowna - hero, szybkie linki, o mnie, filary, specjalizacje, cennik, korzysci, blog, CTA.
 */
$img = function ( $file ) { return esc_url( get_theme_file_uri( 'assets/images/' . $file ) ); };
$u   = function ( $path ) { return esc_url( home_url( $path ) ); };
?>
<!-- wp:group {"tagName":"section","className":"hero"} -->
<section class="wp-block-group hero"><!-- wp:group {"className":"container"} -->
<div class="wp-block-group container"><!-- wp:group {"className":"hero-layout"} -->
<div class="wp-block-group hero-layout"><!-- wp:group {"className":"hero-content"} -->
<div class="wp-block-group hero-content"><!-- wp:paragraph {"className":"hero-eyebrow-text"} -->
<p class="hero-eyebrow-text">Kancelaria Adwokacka · Warszawa</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"className":"hero-title"} -->
<h1 class="wp-block-heading hero-title">Kamila<br><em>Sadłowicz</em></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"hero-subtitle"} -->
<p class="hero-subtitle">Adwokat · Okręgowa Rada Adwokacka w Warszawie</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"hero-desc"} -->
<p class="hero-desc">Profesjonalna obsługa prawna oparta na <strong>rzetelności i skuteczności</strong>.<br>Prawo gospodarcze · Prawo cywilne · Prawo rodzinne · Windykacja należności</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"hero-actions"} -->
<div class="wp-block-buttons hero-actions"><!-- wp:button {"className":"is-style-ks-gold"} -->
<div class="wp-block-button is-style-ks-gold"><a class="wp-block-button__link wp-element-button" href="<?php echo $u( '/kontakt/' ); ?>">Umów konsultację</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-ks-ghost"} -->
<div class="wp-block-button is-style-ks-ghost"><a class="wp-block-button__link wp-element-button" href="<?php echo $u( '/oferta/' ); ?>">Zobacz ofertę</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"hero-stats"} -->
<div class="wp-block-group hero-stats"><!-- wp:group {"className":"stat-item"} -->
<div class="wp-block-group stat-item"><!-- wp:paragraph {"className":"stat-number"} -->
<p class="stat-number">9+</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"stat-label"} -->
<p class="stat-label">lat doświadczenia</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"stat-item"} -->
<div class="wp-block-group stat-item"><!-- wp:paragraph {"className":"stat-number"} -->
<p class="stat-number">80%</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"stat-label"} -->
<p class="stat-label">skuteczność windykacji</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"stat-item"} -->
<div class="wp-block-group stat-item"><!-- wp:paragraph {"className":"stat-number"} -->
<p class="stat-number">200+</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"stat-label"} -->
<p class="stat-label">spraw rocznie</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->

<!-- wp:html -->
<div class="quicklinks"><div class="quicklinks-inner"><div class="quicklinks-grid">
<a href="<?php echo $u( '/oferta/' ); ?>" class="ql-item"><svg class="ql-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg><span class="ql-label">Oferta i Cennik</span><span class="ql-sub">Sprawdź stawki</span></a>
<a href="<?php echo $u( '/specjalizacje/' ); ?>" class="ql-item"><svg class="ql-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg><span class="ql-label">Specjalizacje</span><span class="ql-sub">Obszary praktyki</span></a>
<a href="<?php echo $u( '/o-mnie/' ); ?>" class="ql-item"><svg class="ql-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg><span class="ql-label">O mnie</span><span class="ql-sub">Doświadczenie</span></a>
<a href="<?php echo $u( '/blog/' ); ?>" class="ql-item"><svg class="ql-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg><span class="ql-label">Blog Prawny</span><span class="ql-sub">Artykuły i porady</span></a>
<a href="<?php echo $u( '/faq/' ); ?>" class="ql-item"><svg class="ql-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg><span class="ql-label">FAQ</span><span class="ql-sub">Pytania i odpowiedzi</span></a>
<a href="<?php echo $u( '/kontakt/' ); ?>" class="ql-item ql-primary"><svg class="ql-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg><span class="ql-label">Kontakt</span><span class="ql-sub">Umów konsultację</span></a>
</div></div></div>
<!-- /wp:html -->

<!-- wp:group {"tagName":"section","className":"section"} -->
<section class="wp-block-group section"><!-- wp:group {"className":"container"} -->
<div class="wp-block-group container"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%"><!-- wp:paragraph {"className":"section-label-text"} -->
<p class="section-label-text">O mnie</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"section-title"} -->
<h2 class="wp-block-heading section-title">Adwokat z pasją<br>do <em>skuteczności</em></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Jestem adwokatem z interdyscyplinarnym wykształceniem - Socjologia i Prawo - oraz wieloletnią praktyką w obsłudze podmiotów gospodarczych i klientów indywidualnych. To połączenie pozwala mi rozumieć sprawy nie tylko od strony prawnej, ale też ludzkiej.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Specjalizuję się w prawie cywilnym, gospodarczym i prawie pracy. Łączę wiedzę procesową z biegłością w narzędziach IT, co pozwala mi <strong>efektywnie zarządzać ok. 200 sprawami rocznie</strong>. Skutecznie prowadzę windykację (ok. <strong>80% skuteczności</strong>) i doradzam Zarządom w zakresie corporate governance.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Moje podejście opiera się na <strong>indywidualnym traktowaniu każdego klienta</strong> i głębokiej analizie dokumentacji - wierzę, że sukces wymaga pełnego zrozumienia sytuacji klienta, zarówno faktycznej, jak i emocjonalnej.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-ks-navy"} -->
<div class="wp-block-button is-style-ks-navy"><a class="wp-block-button__link wp-element-button" href="<?php echo $u( '/o-mnie/' ); ?>">Poznaj mnie bliżej</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $img( '7.jpg' ); ?>" alt="Adwokat Kamila Sadłowicz"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","className":"section section-legal-bg"} -->
<section class="wp-block-group section section-legal-bg"><!-- wp:group {"className":"container"} -->
<div class="wp-block-group container"><!-- wp:group {"className":"text-center"} -->
<div class="wp-block-group text-center"><!-- wp:paragraph {"align":"center","className":"section-label-text"} -->
<p class="has-text-align-center section-label-text">Moje podejście</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","className":"section-title"} -->
<h2 class="wp-block-heading has-text-align-center section-title">Jakim jestem <em>adwokatem</em></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"section-intro"} -->
<p class="has-text-align-center section-intro">Rzetelność, komunikacja i skuteczność - to fundamenty mojej pracy. Każdą sprawę traktuję indywidualnie, dbając o to, by klient rozumiał każdy etap postępowania.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"pillars-grid"} -->
<div class="wp-block-group pillars-grid"><!-- wp:group {"className":"pillar-card"} -->
<div class="wp-block-group pillar-card"><!-- wp:paragraph {"className":"pillar-number"} -->
<p class="pillar-number">01</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"className":"pillar-title"} -->
<h3 class="wp-block-heading pillar-title">Wnikliwa analiza dokumentacji</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"pillar-text"} -->
<p class="pillar-text">Dokładnie badam każdy dokument, umowę, dowód - nie pomijam żadnych szczegółów. Często pozornie drobne elementy okazują się kluczowe dla sukcesu sprawy.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"pillar-card"} -->
<div class="wp-block-group pillar-card"><!-- wp:paragraph {"className":"pillar-number"} -->
<p class="pillar-number">02</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"className":"pillar-title"} -->
<h3 class="wp-block-heading pillar-title">Poszukiwanie wszystkich rozwiązań</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"pillar-text"} -->
<p class="pillar-text">Analizuję pełne spektrum dostępnych ścieżek - od negocjacji i mediacji, przez postępowanie polubowne, aż po drogę sądową. Wybieramy najkorzystniejszą strategię razem.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"pillar-card"} -->
<div class="wp-block-group pillar-card"><!-- wp:paragraph {"className":"pillar-number"} -->
<p class="pillar-number">03</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"className":"pillar-title"} -->
<h3 class="wp-block-heading pillar-title">Transparentność i jasna komunikacja</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"pillar-text"} -->
<p class="pillar-text">Unikam prawniczego żargonu - tłumaczę sprawy jasnym, zrozumiałym językiem. Regularnie informuję o postępach, wyjaśniam możliwe scenariusze i ich konsekwencje.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"pillar-card"} -->
<div class="wp-block-group pillar-card"><!-- wp:paragraph {"className":"pillar-number"} -->
<p class="pillar-number">04</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"className":"pillar-title"} -->
<h3 class="wp-block-heading pillar-title">Empatia i zrozumienie</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"pillar-text"} -->
<p class="pillar-text">Wykształcenie socjologiczne pomaga mi rozumieć nie tylko fakty, ale i emocje klientów. Sprawy prawne wiążą się ze stresem - staram się być nie tylko prawnikiem, ale i wsparciem.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"pillar-card"} -->
<div class="wp-block-group pillar-card"><!-- wp:paragraph {"className":"pillar-number"} -->
<p class="pillar-number">05</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"className":"pillar-title"} -->
<h3 class="wp-block-heading pillar-title">Zaangażowanie i dbałość o szczegóły</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"pillar-text"} -->
<p class="pillar-text">Każdej sprawie poświęcam pełną uwagę - niezależnie od wartości czy złożoności. Terminowość i skrupulatność to dla mnie standardy, nie wyjątki.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"pillar-card"} -->
<div class="wp-block-group pillar-card"><!-- wp:paragraph {"className":"pillar-number"} -->
<p class="pillar-number">06</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"className":"pillar-title"} -->
<h3 class="wp-block-heading pillar-title">Nowoczesne technologie i AI</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"pillar-text"} -->
<p class="pillar-text">Wykorzystuję zaawansowane narzędzia cyfrowe i sztuczną inteligencję do analizy dokumentacji i researchu prawnego - oferuję usługi najwyższej jakości przy konkurencyjnych stawkach.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","className":"section"} -->
<section class="wp-block-group section"><!-- wp:group {"className":"container"} -->
<div class="wp-block-group container"><!-- wp:paragraph {"className":"section-label-text"} -->
<p class="section-label-text">Obszary praktyki</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"section-title"} -->
<h2 class="wp-block-heading section-title">Specjalizacje</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"section-intro"} -->
<p class="section-intro">Kompleksowa pomoc prawna w kluczowych obszarach prawa - dla firm i klientów indywidualnych.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"spec-grid"} -->
<div class="wp-block-group spec-grid"><!-- wp:group {"className":"spec-card"} -->
<div class="wp-block-group spec-card"><!-- wp:image {"className":"spec-img-wrap"} -->
<figure class="wp-block-image spec-img-wrap"><img src="<?php echo $img( '11.jpg' ); ?>" alt="Prawo Gospodarcze"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"spec-body"} -->
<div class="wp-block-group spec-body"><!-- wp:heading {"level":3,"className":"spec-title"} -->
<h3 class="wp-block-heading spec-title">Prawo Gospodarcze</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"spec-desc"} -->
<p class="spec-desc">Obsługa spółek, doradztwo dla zarządów, KSH</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"spec-arrow"} -->
<p class="spec-arrow"><a href="<?php echo $u( '/specjalizacje/' ); ?>">Dowiedz się więcej &rarr;</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"spec-card"} -->
<div class="wp-block-group spec-card"><!-- wp:image {"className":"spec-img-wrap"} -->
<figure class="wp-block-image spec-img-wrap"><img src="<?php echo $img( '12.jpg' ); ?>" alt="Restrukturyzacja"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"spec-body"} -->
<div class="wp-block-group spec-body"><!-- wp:heading {"level":3,"className":"spec-title"} -->
<h3 class="wp-block-heading spec-title">Restrukturyzacja</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"spec-desc"} -->
<p class="spec-desc">Postępowania upadłościowe i restrukturyzacyjne</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"spec-arrow"} -->
<p class="spec-arrow"><a href="<?php echo $u( '/specjalizacje/' ); ?>">Dowiedz się więcej &rarr;</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"spec-card"} -->
<div class="wp-block-group spec-card"><!-- wp:image {"className":"spec-img-wrap"} -->
<figure class="wp-block-image spec-img-wrap"><img src="<?php echo $img( '13.jpg' ); ?>" alt="Prawo Pracy"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"spec-body"} -->
<div class="wp-block-group spec-body"><!-- wp:heading {"level":3,"className":"spec-title"} -->
<h3 class="wp-block-heading spec-title">Prawo Pracy</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"spec-desc"} -->
<p class="spec-desc">Spory pracownicze, rozwiązywanie umów, mobbing</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"spec-arrow"} -->
<p class="spec-arrow"><a href="<?php echo $u( '/specjalizacje/' ); ?>">Dowiedz się więcej &rarr;</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"spec-card"} -->
<div class="wp-block-group spec-card"><!-- wp:image {"className":"spec-img-wrap"} -->
<figure class="wp-block-image spec-img-wrap"><img src="<?php echo $img( '28.jpg' ); ?>" alt="Windykacja Należności"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"spec-body"} -->
<div class="wp-block-group spec-body"><!-- wp:heading {"level":3,"className":"spec-title"} -->
<h3 class="wp-block-heading spec-title">Windykacja Należności</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"spec-desc"} -->
<p class="spec-desc">Skuteczne odzyskiwanie należności (80% skuteczność)</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"spec-arrow"} -->
<p class="spec-arrow"><a href="<?php echo $u( '/specjalizacje/' ); ?>">Dowiedz się więcej &rarr;</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"spec-card"} -->
<div class="wp-block-group spec-card"><!-- wp:image {"className":"spec-img-wrap"} -->
<figure class="wp-block-image spec-img-wrap"><img src="<?php echo $img( '29a.jpg' ); ?>" alt="Prawo Cywilne i Rodzinne"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"spec-body"} -->
<div class="wp-block-group spec-body"><!-- wp:heading {"level":3,"className":"spec-title"} -->
<h3 class="wp-block-heading spec-title">Prawo Cywilne i Rodzinne</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"spec-desc"} -->
<p class="spec-desc">Rozwody, alimenty, spadki, odszkodowania</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"spec-arrow"} -->
<p class="spec-arrow"><a href="<?php echo $u( '/specjalizacje/' ); ?>">Dowiedz się więcej &rarr;</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"spec-card"} -->
<div class="wp-block-group spec-card"><!-- wp:image {"className":"spec-img-wrap"} -->
<figure class="wp-block-image spec-img-wrap"><img src="<?php echo $img( '16.jpg' ); ?>" alt="Prawo Własności Intelektualnej"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"spec-body"} -->
<div class="wp-block-group spec-body"><!-- wp:heading {"level":3,"className":"spec-title"} -->
<h3 class="wp-block-heading spec-title">Prawo Własności Intelektualnej</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"spec-desc"} -->
<p class="spec-desc">Ochrona praw autorskich, w tym w zakresie AI</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"spec-arrow"} -->
<p class="spec-arrow"><a href="<?php echo $u( '/specjalizacje/' ); ?>">Dowiedz się więcej &rarr;</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"spec-card"} -->
<div class="wp-block-group spec-card"><!-- wp:image {"className":"spec-img-wrap"} -->
<figure class="wp-block-image spec-img-wrap"><img src="<?php echo $img( '31a.jpg' ); ?>" alt="Prawo Ubezpieczeniowe"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"spec-body"} -->
<div class="wp-block-group spec-body"><!-- wp:heading {"level":3,"className":"spec-title"} -->
<h3 class="wp-block-heading spec-title">Prawo Ubezpieczeniowe</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"spec-desc"} -->
<p class="spec-desc">Dochodzenie roszczeń z polis ubezpieczeniowych</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"spec-arrow"} -->
<p class="spec-arrow"><a href="<?php echo $u( '/specjalizacje/' ); ?>">Dowiedz się więcej &rarr;</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"spec-card"} -->
<div class="wp-block-group spec-card"><!-- wp:image {"className":"spec-img-wrap"} -->
<figure class="wp-block-image spec-img-wrap"><img src="<?php echo $img( '21a.jpg' ); ?>" alt="Compliance i Audyt Prawny"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"spec-body"} -->
<div class="wp-block-group spec-body"><!-- wp:heading {"level":3,"className":"spec-title"} -->
<h3 class="wp-block-heading spec-title">Compliance i Audyt Prawny</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"spec-desc"} -->
<p class="spec-desc">Regulaminy, umowy, polityki RODO</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"spec-arrow"} -->
<p class="spec-arrow"><a href="<?php echo $u( '/specjalizacje/' ); ?>">Dowiedz się więcej &rarr;</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"48px"}}}} -->
<div class="wp-block-buttons" style="margin-top:48px"><!-- wp:button {"className":"is-style-ks-navy"} -->
<div class="wp-block-button is-style-ks-navy"><a class="wp-block-button__link wp-element-button" href="<?php echo $u( '/specjalizacje/' ); ?>">Wszystkie specjalizacje</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","className":"section section-alt"} -->
<section class="wp-block-group section section-alt"><!-- wp:group {"className":"container"} -->
<div class="wp-block-group container"><!-- wp:paragraph {"className":"section-label-text"} -->
<p class="section-label-text">Cennik</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"section-title"} -->
<h2 class="wp-block-heading section-title">Oferta i <em>Cennik</em></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"section-intro"} -->
<p class="section-intro">Transparentne ceny i indywidualne podejście do każdego klienta.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"className":"offer-grid"} -->
<div class="wp-block-group offer-grid"><!-- wp:group {"className":"offer-card"} -->
<div class="wp-block-group offer-card"><!-- wp:heading {"level":3,"className":"offer-title"} -->
<h3 class="wp-block-heading offer-title">Porady Prawne</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"offer-price"} -->
<p class="offer-price">od 350 zł</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"offer-desc"} -->
<p class="offer-desc">Pierwsza konsultacja i szczegółowa analiza Twojej sprawy</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"offer-card"} -->
<div class="wp-block-group offer-card"><!-- wp:heading {"level":3,"className":"offer-title"} -->
<h3 class="wp-block-heading offer-title">Reprezentacja Sądowa</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"offer-price"} -->
<p class="offer-price">wycena indywidualna</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"offer-desc"} -->
<p class="offer-desc">Skuteczna obrona Twoich interesów przed sądem</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"offer-card highlighted"} -->
<div class="wp-block-group offer-card highlighted"><!-- wp:paragraph {"className":"offer-badge"} -->
<p class="offer-badge">Polecane dla firm</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"className":"offer-title"} -->
<h3 class="wp-block-heading offer-title">Abonament Prawny</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"offer-price"} -->
<p class="offer-price">od 1.000 zł / mc</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"offer-desc"} -->
<p class="offer-desc">Kompleksowa, stała obsługa prawna dla przedsiębiorców</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"offer-card"} -->
<div class="wp-block-group offer-card"><!-- wp:heading {"level":3,"className":"offer-title"} -->
<h3 class="wp-block-heading offer-title">Windykacja Należności</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"offer-price"} -->
<p class="offer-price">success fee lub stawka stała</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"offer-desc"} -->
<p class="offer-desc">Model rozliczenia dopasowany do specyfiki sprawy</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"offer-card"} -->
<div class="wp-block-group offer-card"><!-- wp:heading {"level":3,"className":"offer-title"} -->
<h3 class="wp-block-heading offer-title">Sprawy Rodzinne</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"offer-price"} -->
<p class="offer-price">od 1.000 zł</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"offer-desc"} -->
<p class="offer-desc">Rozwody, alimenty, podział majątku</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"offer-card"} -->
<div class="wp-block-group offer-card"><!-- wp:heading {"level":3,"className":"offer-title"} -->
<h3 class="wp-block-heading offer-title">Doradztwo Dla Przedsiębiorców</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"offer-price"} -->
<p class="offer-price">od 800 zł</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"offer-desc"} -->
<p class="offer-desc">Umowy, sprawy korporacyjne, prawo pracy</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"offer-note"} -->
<p class="offer-note">Każda sprawa jest inna, dlatego zapraszam do kontaktu w celu omówienia szczegółów i przygotowania indywidualnej wyceny dopasowanej do Twoich potrzeb.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"40px"}}}} -->
<div class="wp-block-buttons" style="margin-top:40px"><!-- wp:button {"className":"is-style-ks-navy"} -->
<div class="wp-block-button is-style-ks-navy"><a class="wp-block-button__link wp-element-button" href="<?php echo $u( '/oferta/' ); ?>">Pełna oferta i cennik</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","className":"section"} -->
<section class="wp-block-group section"><!-- wp:group {"className":"container"} -->
<div class="wp-block-group container"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"42%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:42%"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="<?php echo $img( '2.jpg' ); ?>" alt="Kancelaria Adwokacka Kamila Sadłowicz"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"58%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:58%"><!-- wp:paragraph {"className":"section-label-text"} -->
<p class="section-label-text">Dlaczego warto</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"section-title"} -->
<h2 class="wp-block-heading section-title">Dlaczego warto ze mną <em>współpracować</em></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"benefit-row"} -->
<p class="benefit-row">Ponad 9 lat doświadczenia w zawodzie prawniczym</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"benefit-row"} -->
<p class="benefit-row">80% skuteczność w windykacji należności</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"benefit-row"} -->
<p class="benefit-row">Kompleksowa obsługa - od analizy do finalizacji sprawy</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"benefit-row"} -->
<p class="benefit-row">Indywidualne podejście i pełne zaangażowanie</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"benefit-row"} -->
<p class="benefit-row">Transparentne ceny i jasna komunikacja bez żargonu</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"benefit-row"} -->
<p class="benefit-row">Biegłość w systemach sądowych i nowoczesnych narzędziach IT</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"benefit-row"} -->
<p class="benefit-row">Interdyscyplinarne wykształcenie: Prawo + Socjologia</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"benefit-row"} -->
<p class="benefit-row">Edukacja prawna klientów - uczę, jak unikać problemów w przyszłości</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","className":"section section-alt"} -->
<section class="wp-block-group section section-alt"><!-- wp:group {"className":"container"} -->
<div class="wp-block-group container"><!-- wp:paragraph {"className":"section-label-text"} -->
<p class="section-label-text">Blog Prawny</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"section-title"} -->
<h2 class="wp-block-heading section-title">Najnowsze <em>wpisy</em></h2>
<!-- /wp:heading -->

<!-- wp:latest-posts {"postsToShow":3,"displayPostContent":true,"excerptLength":24,"displayPostDate":true,"className":"ks-latest"} /-->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"40px"}}}} -->
<div class="wp-block-buttons" style="margin-top:40px"><!-- wp:button {"className":"is-style-ks-navy"} -->
<div class="wp-block-button is-style-ks-navy"><a class="wp-block-button__link wp-element-button" href="<?php echo $u( '/blog/' ); ?>">Wszystkie wpisy</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","className":"cta-section"} -->
<section class="wp-block-group cta-section"><!-- wp:group {"className":"container"} -->
<div class="wp-block-group container"><!-- wp:group {"className":"cta-inner"} -->
<div class="wp-block-group cta-inner"><!-- wp:group {"className":"cta-text"} -->
<div class="wp-block-group cta-text"><!-- wp:heading -->
<h2 class="wp-block-heading">Potrzebujesz pomocy<br><em>prawnej?</em></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Umów się na konsultację - omówimy Twoją sprawę szczegółowo i znajdziemy najlepsze rozwiązanie.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-buttons is-vertical"><!-- wp:button {"className":"is-style-ks-gold"} -->
<div class="wp-block-button is-style-ks-gold"><a class="wp-block-button__link wp-element-button" href="<?php echo $u( '/kontakt/' ); ?>">Umów konsultację teraz</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-ks-ghost"} -->
<div class="wp-block-button is-style-ks-ghost"><a class="wp-block-button__link wp-element-button" href="tel:+48790013287">+48 790 013 287</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
