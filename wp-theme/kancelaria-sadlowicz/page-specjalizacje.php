<?php get_header(); ?>

<!-- ===== PAGE HERO ===== -->
<section class="page-hero">
    <div class="page-hero-diagonal"></div>
    <div class="container">
        <div class="page-hero-eyebrow">
            <div class="page-hero-eyebrow-line"></div>
            <span class="page-hero-eyebrow-text">Obszary Praktyki · Warszawa</span>
        </div>
        <h1 class="page-hero-title">Specjali<em>zacje</em></h1>
        <p class="page-hero-desc">Kompleksowa obsługa prawna w kluczowych dziedzinach prawa. Doświadczenie, profesjonalizm i skuteczność w każdej sprawie.</p>
        <div class="page-hero-actions">
            <a href="<?php echo home_url('/kontakt/'); ?>" class="btn-gold">
                Umów konsultację
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
            <a href="<?php echo home_url('/oferta/'); ?>" class="btn-ghost">Zobacz ofertę i cennik</a>
        </div>
    </div>
</section>

<?php if (ks_use_elementor_content()): ?>
    <?php while (have_posts()): the_post(); the_content(); endwhile; ?>
<?php else: ?>

    <!-- Sticky Navigation (Anchor Menu) -->
    <nav class="spec-sticky-nav" id="specStickyNav">
        <div class="container">
            <div class="spec-nav-scroll">
                <a href="#prawo-gospodarcze">Prawo Gospodarcze</a>
                <a href="#prawo-pracy">Prawo Pracy</a>
                <a href="#windykacja">Windykacja</a>
                <a href="#prawo-cywilne">Prawo Cywilne</a>
                <a href="#wlasnosc-intelektualna">Własność Intelektualna</a>
                <a href="#prawo-ubezpieczeniowe">Prawo Ubezpieczeniowe</a>
            </div>
        </div>
    </nav>

    <!-- Intro Section -->
    <section class="spec-intro">
        <div class="container">
            <div class="section-header">
                <h2>Kompleksowa Obsługa Prawna</h2>
                <div class="divider"></div>
            </div>
            <p class="spec-intro-text">
                Specjalizuję się w ośmiu kluczowych obszarach prawa, oferując kompleksową obsługę zarówno dla przedsiębiorców, jak i klientów indywidualnych. Wieloletnie doświadczenie, rzetelność i indywidualne podejście do każdej sprawy gwarantują skuteczne rozwiązanie Twoich problemów prawnych.
            </p>
        </div>
    </section>

    <!-- ========================================
         SPECJALIZACJA 1: PRAWO GOSPODARCZE
         Layout: Tekst po lewej, Obraz po prawej
         Tło: Białe
         ======================================== -->
    <section class="spec-detail" id="prawo-gospodarcze">
        <div class="container">
            <div class="spec-layout">
                <div class="spec-content">
                    <div class="spec-heading">
                        <div class="spec-icon-large">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/11.png" alt="Prawo Gospodarcze">
                        </div>
                        <h2>Prawo Gospodarcze</h2>
                    </div>
                    <p class="spec-lead">
                        Prawo gospodarcze to kompleksowa obsługa prawna przedsiębiorców na każdym etapie prowadzenia działalności – od rejestracji spółki, przez bieżące doradztwo, aż po reprezentację w sporach korporacyjnych.
                    </p>
                    <p>
                        Jako adwokat specjalizujący się w prawie gospodarczym oferuję pełne wsparcie dla spółek, zarządów i przedsiębiorców indywidualnych. Moje wieloletnie doświadczenie w obsłudze podmiotów gospodarczych pozwala mi skutecznie doradzać w najtrudniejszych sprawach biznesowych.
                    </p>
                    <p>
                        Kompleksowo doradzam w kwestiach związanych z funkcjonowaniem spółek handlowych zgodnie z Kodeksem spółek handlowych (KSH), reprezentuję Zarządy przed organami nadzorczymi oraz wspieram w przekształceniach i zmianach organizacyjnych spółek.
                    </p>
                    <p>
                        Współpracuję zarówno z małymi firmami rodzinnymi, jak i dużymi korporacjami, dostosowując strategię prawną do specyfiki branży i potrzeb biznesowych klienta.
                    </p>

                    <h3>Co obejmuje usługa:</h3>
                    <ul class="spec-list">
                        <li>Zakładanie i rejestracja spółek (sp. z o.o., S.A., spółki komandytowe, partnerskie)</li>
                        <li>Doradztwo dla Zarządów w zakresie corporate governance</li>
                        <li>Przygotowywanie i weryfikacja umów handlowych, kontraktów B2B</li>
                        <li>Reprezentacja w sporach korporacyjnych i gospodarczych</li>
                        <li>Obsługa przekształceń i zmian struktury spółek</li>
                        <li>Due diligence prawne</li>
                        <li>Compliance i audyt prawny spółek</li>
                    </ul>

                    <h3>Przykłady spraw:</h3>
                    <ul class="spec-examples">
                        <li>Obsługa prawna przekształcenia sp. z o.o. w spółkę akcyjną</li>
                        <li>Reprezentacja Zarządu w postępowaniu przed KRS</li>
                        <li>Przygotowanie umowy joint venture dla startupu technologicznego</li>
                        <li>Windykacja należności B2B z tytułu niewykonanych kontraktów</li>
                        <li>Doradztwo w procesie wyjścia wspólnika ze spółki</li>
                    </ul>

                    <div class="spec-cta">
                        <a href="oferta.html#prawo-gospodarcze" class="btn btn-outline">Zobacz ofertę i cennik →</a>
                    </div>
                </div>
                <div class="spec-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/25.png" alt="Prawo Gospodarcze - Kancelaria Adwokacka">
                </div>
            </div>
        </div>
    </section>


    <!-- ========================================
         SPECJALIZACJA 3: PRAWO PRACY
         Layout: Tekst po lewej, Obraz po prawej
         Tło: Białe
         ======================================== -->
    <section class="spec-detail" id="prawo-pracy">
        <div class="container">
            <div class="spec-layout">
                <div class="spec-content">
                    <div class="spec-heading">
                        <div class="spec-icon-large">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/13.png" alt="Prawo Pracy">
                        </div>
                        <h2>Prawo Pracy</h2>
                    </div>
                    <p class="spec-lead">
                        Prawo pracy to złożona dziedzina regulująca relacje pracownik-pracodawca. Reprezentuję zarówno pracowników dochodzących swoich praw, jak i pracodawców potrzebujących wsparcia w sporach pracowniczych i tworzeniu regulaminów wewnętrznych.
                    </p>
                    <p>
                        Skutecznie bronię interesów pracowników w sprawach o przywrócenie do pracy, odszkodowania za niezgodne z prawem rozwiązanie umowy, niewypłacone wynagrodzenia, mobbing oraz dyskryminację w miejscu pracy.
                    </p>
                    <p>
                        Dla pracodawców oferuję kompleksowe doradztwo w zakresie tworzenia regulaminów pracy i wynagrodzeń, weryfikacji umów o pracę, przygotowania dokumentacji zwolnień (w tym zwolnień grupowych), reprezentacji przed sądami pracy oraz Państwową Inspekcją Pracy.
                    </p>
                    <p>
                        Dzięki mojemu interdyscyplinarnemu wykształceniu (Prawo + Socjologia) rozumiem nie tylko aspekty prawne, ale także emocjonalne i społeczne konflikty w miejscu pracy, co pozwala mi skutecznie mediować i znajdować rozwiązania polubowne.
                    </p>

                    <h3>Co obejmuje usługa:</h3>
                    <ul class="spec-list">
                        <li>Reprezentacja pracowników w sporach o przywrócenie do pracy</li>
                        <li>Dochodzenie odszkodowań za niezgodne z prawem zwolnienie</li>
                        <li>Sprawy o mobbing i dyskryminację w miejscu pracy</li>
                        <li>Windykacja wynagrodzeń i innych należności pracowniczych</li>
                        <li>Doradztwo dla pracodawców – regulaminy, umowy, zwolnienia</li>
                        <li>Reprezentacja przed Państwową Inspekcją Pracy</li>
                        <li>Mediacje i negocjacje ugodowe w sporach pracowniczych</li>
                    </ul>

                    <h3>Przykłady spraw:</h3>
                    <ul class="spec-examples">
                        <li>Skuteczne przywrócenie pracownika do pracy po bezprawnym zwolnieniu</li>
                        <li>Wygrany proces o mobbing z odszkodowaniem 50 tys. zł</li>
                        <li>Windykacja zaległych wynagrodzeń dla grupy pracowników</li>
                        <li>Obsługa prawna zwolnień grupowych dla przedsiębiorstwa</li>
                        <li>Negocjacje ugodowe w sporze o dyskryminację płacową</li>
                    </ul>

                    <div class="spec-cta">
                        <a href="oferta.html#prawo-pracy" class="btn btn-outline">Zobacz ofertę i cennik →</a>
                    </div>
                </div>
                <div class="spec-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/27.png" alt="Prawo Pracy - Kancelaria Adwokacka">
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         SPECJALIZACJA 4: WINDYKACJA NALEŻNOŚCI
         Layout: Obraz po lewej, Tekst po prawej
         Tło: 22.png
         ======================================== -->
    <section class="spec-detail spec-detail-alt" id="windykacja">
        <div class="container">
            <div class="spec-layout">
                <div class="spec-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/28.png" alt="Windykacja Należności - Kancelaria Adwokacka">
                </div>
                <div class="spec-content">
                    <div class="spec-heading">
                        <div class="spec-icon-large">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/14.png" alt="Windykacja Należności">
                        </div>
                        <h2>Windykacja Należności</h2>
                    </div>
                    <p class="spec-lead">
                        Windykacja należności to moja specjalizacja, w której osiągam około 80% skuteczności. Skutecznie odzyskuję należności dla przedsiębiorców, małych firm oraz osób prywatnych – zarówno drogą polubowną, jak i sądową.
                    </p>
                    <p>
                        Prowadzę kompleksowe procesy windykacyjne – od wezwań do zapłaty, przez postępowanie upominawcze i procesy sądowe, aż po egzekucję komorniczą. Dzięki biegłości w systemach sądowych oraz efektywnemu zarządzaniu referatem ok. 200 spraw rocznie, zapewniam szybkie i skuteczne odzyskiwanie należności.
                    </p>
                    <p>
                        Oferuję elastyczne modele rozliczeń – zarówno stawkę stałą, jak i success fee (wynagrodzenie uzależnione od skuteczności windykacji), co pozwala dopasować współpracę do możliwości finansowych klienta.
                    </p>
                    <p>
                        Specjalizuję się w windykacji należności B2B (między przedsiębiorcami), należności konsumenckich oraz należności z tytułu umów cywilnoprawnych. Prowadzę również sprawy o zapłatę w postępowaniach gospodarczych przed sądami okręgowymi.
                    </p>

                    <h3>Co obejmuje usługa:</h3>
                    <ul class="spec-list">
                        <li>Windykacja polubowna – wezwania do zapłaty, negocjacje ugodowe</li>
                        <li>Postępowanie upominawcze (szybkie uzyskanie nakazu zapłaty)</li>
                        <li>Procesy sądowe o zapłatę (sprawy cywilne i gospodarcze)</li>
                        <li>Egzekucja komornicza należności</li>
                        <li>Windykacja należności B2B i konsumenckich</li>
                        <li>Windykacja należności ze zleceń, umów o dzieło, pożyczek</li>
                        <li>Reprezentacja w sprawach frankowych i kredytowych</li>
                    </ul>

                    <h3>Przykłady spraw:</h3>
                    <ul class="spec-examples">
                        <li>Odzyskanie 150 tys. zł dla firmy IT z tytułu niewykonanej umowy</li>
                        <li>Skuteczna windykacja należności w postępowaniu upominawczym (3 tygodnie)</li>
                        <li>Egzekucja komornicza z zabezpieczeniem na nieruchomości dłużnika</li>
                        <li>Windykacja należności frankowych dla grupy kredytobiorców</li>
                    </ul>

                    <div class="spec-cta">
                        <a href="oferta.html#windykacja" class="btn btn-outline">Zobacz ofertę i cennik →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         SPECJALIZACJA 5: PRAWO CYWILNE I RODZINNE
         Layout: Tekst po lewej, Obraz po prawej
         Tło: Białe
         ======================================== -->
    <section class="spec-detail" id="prawo-cywilne">
        <div class="container">
            <div class="spec-layout">
                <div class="spec-content">
                    <div class="spec-heading">
                        <div class="spec-icon-large">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/15.png" alt="Prawo Cywilne i Rodzinne">
                        </div>
                        <h2>Prawo Cywilne i Rodzinne</h2>
                    </div>
                    <p class="spec-lead">
                        Prawo cywilne i rodzinne to obszar, w którym łączę wiedzę prawniczą z empatią i zrozumieniem dla trudnych sytuacji życiowych klientów. Reprezentuję w sprawach rozwodowych, alimentacyjnych, spadkowych oraz odszkodowawczych.
                    </p>
                    <p>
                        Sprawy rodzinne to często najtrudniejsze emocjonalnie momenty w życiu – rozwody, separacje, walka o kontakty z dziećmi, alimenty. Moje interdyscyplinarne wykształcenie (Prawo + Socjologia) pozwala mi nie tylko skutecznie bronić Twoich interesów, ale również wspierać Cię emocjonalnie w tym trudnym czasie.
                    </p>
                    <p>
                        W sprawach cywilnych reprezentuję klientów w procesach odszkodowawczych (wypadki komunikacyjne, błędy medyczne, szkody na osobie), sprawach spadkowych (stwierdzenie nabycia spadku, działów spadku, testamenty), oraz w sprawach dotyczących nieruchomości (roszczenia windykacyjne, zniesienie współwłasności).
                    </p>
                    <p>
                        Zawsze staram się w pierwszej kolejności wypracować rozwiązania polubowne (ugody, mediacje), które oszczędzają czas, pieniądze i emocje. Jeśli jednak sprawa wymaga procesu sądowego – reprezentuję z pełnym zaangażowaniem.
                    </p>

                    <h3>Co obejmuje usługa:</h3>
                    <ul class="spec-list">
                        <li>Rozwody i separacje (z orzekaniem o winie lub bez winy)</li>
                        <li>Alimenty na dzieci i małżonka (ustalanie, podwyższanie, egzekucja)</li>
                        <li>Kontakty z dziećmi, władza rodzicielska, miejsce zamieszkania dziecka</li>
                        <li>Podział majątku wspólnego małżonków</li>
                        <li>Sprawy spadkowe – stwierdzenie nabycia spadku, działy spadku, testamenty</li>
                        <li>Odszkodowania za szkody osobowe i majątkowe (wypadki, błędy medyczne)</li>
                        <li>Sprawy dotyczące nieruchomości (zniesienie współwłasności, roszczenia)</li>
                    </ul>

                    <h3>Przykłady spraw:</h3>
                    <ul class="spec-examples">
                        <li>Skuteczny rozwód z orzeczeniem o winie i wysokimi alimentami</li>
                        <li>Wywalczenie rozszerzonych kontaktów ojca z dzieckiem</li>
                        <li>Podział majątku wspólnego wartości 1,5 mln zł</li>
                        <li>Odszkodowanie 200 tys. zł za wypadek komunikacyjny</li>
                        <li>Dział spadku z nieruchomościami – ugoda polubowna</li>
                    </ul>

                    <div class="spec-cta">
                        <a href="oferta.html#prawo-cywilne" class="btn btn-outline">Zobacz ofertę i cennik →</a>
                    </div>
                </div>
                <div class="spec-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/29.png" alt="Prawo Cywilne i Rodzinne - Kancelaria Adwokacka">
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         SPECJALIZACJA 6: PRAWO WŁASNOŚCI INTELEKTUALNEJ
         Layout: Obraz po lewej, Tekst po prawej
         Tło: 23.png
         ======================================== -->
    <section class="spec-detail spec-detail-alt" id="wlasnosc-intelektualna">
        <div class="container">
            <div class="spec-layout">
                <div class="spec-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/30.png" alt="Prawo Własności Intelektualnej - Kancelaria Adwokacka">
                </div>
                <div class="spec-content">
                    <div class="spec-heading">
                        <div class="spec-icon-large">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/16.png" alt="Prawo Własności Intelektualnej">
                        </div>
                        <h2>Prawo Własności Intelektualnej</h2>
                    </div>
                    <p class="spec-lead">
                        Prawo własności intelektualnej to dynamicznie rozwijająca się dziedzina, szczególnie w kontekście nowych technologii i sztucznej inteligencji. Oferuję kompleksowe doradztwo w zakresie ochrony praw autorskich, znaków towarowych oraz wykorzystania AI w biznesie.
                    </p>
                    <p>
                        W erze cyfryzacji i sztucznej inteligencji ochrona własności intelektualnej staje się kluczowa dla każdego przedsiębiorcy, twórcy czy startupu technologicznego. Doradzam w zakresie rejestracji znaków towarowych, patentów, ochrony praw autorskich do utworów (teksty, grafiki, muzyka, kod źródłowy), oraz w sprawach naruszeń IP.
                    </p>
                    <p>
                        Specjalizuję się również w nowej, rozwijającej się dziedzinie – prawnych aspektach wykorzystania sztucznej inteligencji. Doradzam, jak legalnie wykorzystywać narzędzia AI w biznesie (ChatGPT, Midjourney, generatory treści), jakie są prawa autorskie do treści generowanych przez AI, oraz jak chronić własne utwory przed nieuprawnionym wykorzystaniem przez AI.
                    </p>
                    <p>
                        Reprezentuję również w sporach o naruszenie praw autorskich, znaków towarowych oraz w sprawach dotyczących umów licencyjnych i cesji praw autorskich.
                    </p>

                    <h3>Co obejmuje usługa:</h3>
                    <ul class="spec-list">
                        <li>Rejestracja znaków towarowych w EUIPO i UPRP</li>
                        <li>Ochrona praw autorskich do utworów (teksty, grafiki, oprogramowanie)</li>
                        <li>Doradztwo w zakresie legalnego wykorzystania AI w biznesie</li>
                        <li>Przygotowywanie umów licencyjnych i cesji praw autorskich</li>
                        <li>Reprezentacja w sporach o naruszenie praw autorskich i znaków towarowych</li>
                        <li>Ochrona tajemnicy przedsiębiorstwa i know-how</li>
                        <li>Audyt prawny w zakresie zgodności z przepisami o prawach autorskich</li>
                    </ul>

                    <h3>Przykłady spraw:</h3>
                    <ul class="spec-examples">
                        <li>Rejestracja znaku towarowego dla startupu technologicznego w UE</li>
                        <li>Doradztwo w zakresie wykorzystania AI do generowania treści marketingowych</li>
                        <li>Reprezentacja w sprawie o naruszenie praw autorskich do oprogramowania</li>
                        <li>Przygotowanie polityki wykorzystania AI zgodnej z RODO i prawem autorskim</li>
                    </ul>

                    <div class="spec-cta">
                        <a href="oferta.html#wlasnosc-intelektualna" class="btn btn-outline">Zobacz ofertę i cennik →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         SPECJALIZACJA 7: PRAWO UBEZPIECZENIOWE
         Layout: Tekst po lewej, Obraz po prawej
         Tło: Białe
         ======================================== -->
    <section class="spec-detail" id="prawo-ubezpieczeniowe">
        <div class="container">
            <div class="spec-layout">
                <div class="spec-content">
                    <div class="spec-heading">
                        <div class="spec-icon-large">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/17.png" alt="Prawo Ubezpieczeniowe">
                        </div>
                        <h2>Prawo Ubezpieczeniowe</h2>
                    </div>
                    <p class="spec-lead">
                        Prawo ubezpieczeniowe to obszar, w którym reprezentuję osoby poszkodowane w dochodzeniu roszczeń z ubezpieczeń komunikacyjnych (OC, AC), ubezpieczeń majątkowych, życiowych oraz zdrowotnych.
                    </p>
                    <p>
                        Towarzystwa ubezpieczeniowe często odmawiają wypłaty odszkodowań lub oferują zaniżone kwoty, licząc na brak wiedzy prawnej poszkodowanych. Skutecznie reprezentuję klientów w sporach z ubezpieczycielami – zarówno w postępowaniach przedsądowych (negocjacje, wezwania do zapłaty), jak i w procesach sądowych.
                    </p>
                    <p>
                        Specjalizuję się w sprawach o odszkodowania z ubezpieczeń OC/AC po wypadkach komunikacyjnych, zadośćuczynienia za uszczerbek na zdrowiu, odszkodowań za szkody w nieruchomościach (zalania, pożary), oraz w sprawach dotyczących umów ubezpieczenia na życie.
                    </p>
                    <p>
                        Dla przedsiębiorców oferuję również doradztwo przy zawieraniu umów ubezpieczenia (weryfikacja warunków, negocjacje składek), reprezentację w sprawach o wypłatę odszkodowań z ubezpieczeń biznesowych oraz w sporach dotyczących ubezpieczeń odpowiedzialności cywilnej (OC zawodowe, OC członków zarządu).
                    </p>

                    <h3>Co obejmuje usługa:</h3>
                    <ul class="spec-list">
                        <li>Dochodzenie odszkodowań z ubezpieczeń OC/AC po wypadkach</li>
                        <li>Zadośćuczynienia za uszczerbek na zdrowiu i szkody osobowe</li>
                        <li>Odszkodowania za szkody w nieruchomościach (zalania, pożary, włamania)</li>
                        <li>Reprezentacja w sporach z ubezpieczeniami życiowymi i zdrowotnymi</li>
                        <li>Doradztwo przy zawieraniu umów ubezpieczenia dla firm</li>
                        <li>Reprezentacja w sprawach dotyczących OC zawodowego i OC członków zarządu</li>
                        <li>Negocjacje z likwidatorami szkód i rzeczoznawcami</li>
                    </ul>

                    <h3>Przykłady spraw:</h3>
                    <ul class="spec-examples">
                        <li>Wywalczone odszkodowanie 120 tys. zł za kolizję – ubezpieczyciel oferował 40 tys. zł</li>
                        <li>Zadośćuczynienie 80 tys. zł za trwały uszczerbek na zdrowiu po wypadku</li>
                        <li>Odszkodowanie za zalanie mieszkania – spór z administracją budynku</li>
                        <li>Reprezentacja w sprawie o wypłatę z ubezpieczenia na życie (odmowa płatności)</li>
                    </ul>

                    <div class="spec-cta">
                        <a href="oferta.html#prawo-ubezpieczeniowe" class="btn btn-outline">Zobacz ofertę i cennik →</a>
                    </div>
                </div>
                <div class="spec-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/31.png" alt="Prawo Ubezpieczeniowe - Kancelaria Adwokacka">
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         SPECJALIZACJA 8: COMPLIANCE I AUDYT PRAWNY
         Layout: Obraz po lewej, Tekst po prawej
         Tło: 24.png
         ======================================== -->
    <section class="spec-detail spec-detail-alt" id="compliance">
        <div class="container">
            <div class="spec-layout">
                <div class="spec-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/32.png" alt="Compliance i Audyt Prawny - Kancelaria Adwokacka">
                </div>
                <div class="spec-content">
                    <div class="spec-heading">
                        <div class="spec-icon-large">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/18.png" alt="Compliance i Audyt Prawny">
                        </div>
                        <h2>Compliance i Audyt Prawny</h2>
                    </div>
                    <p class="spec-lead">
                        Compliance i audyt prawny to kluczowe obszary zarządzania ryzykiem prawnym w przedsiębiorstwach. Oferuję kompleksowe doradztwo w zakresie zgodności z przepisami prawa, tworzenia regulaminów wewnętrznych oraz audytu prawnego spółek.
                    </p>
                    <p>
                        W dzisiejszym dynamicznie zmieniającym się otoczeniu prawnym (RODO, prawo pracy, prawo gospodarcze, prawo konkurencji) przedsiębiorcy muszą na bieżąco dbać o zgodność swojej działalności z przepisami. Przeprowadzam kompleksowe audyty prawne, identyfikując obszary ryzyka i proponując konkretne rozwiązania.
                    </p>
                    <p>
                        Specjalizuję się w tworzeniu regulaminów pracy, regulaminów wynagrodzeń, polityk RODO, procedur antykorupcyjnych, kodeksów etyki oraz innych dokumentów wewnętrznych dostosowanych do specyfiki branży i wielkości przedsiębiorstwa.
                    </p>
                    <p>
                        Doradzam również w zakresie wdrażania systemów compliance (zapobieganie nieprawidłowościom, ochrona sygnalistów, procedury wewnętrzne), przeprowadzam szkolenia dla pracowników oraz wspieram w kontaktach z organami nadzorczymi (Inspekcja Pracy, UODO, UOKiK).
                    </p>

                    <h3>Co obejmuje usługa:</h3>
                    <ul class="spec-list">
                        <li>Audyt prawny przedsiębiorstwa (identyfikacja ryzyk prawnych)</li>
                        <li>Tworzenie regulaminów pracy, wynagrodzeń, ZFŚS</li>
                        <li>Przygotowanie polityk RODO i wdrożenie zgodności z ochroną danych</li>
                        <li>Procedury antykorupcyjne i kodeksy etyki</li>
                        <li>Ochrona sygnalistów (whistleblowing) – procedury wewnętrzne</li>
                        <li>Compliance w zakresie prawa konkurencji i zamówień publicznych</li>
                        <li>Szkolenia dla pracowników z zakresu compliance i RODO</li>
                    </ul>

                    <h3>Przykłady spraw:</h3>
                    <ul class="spec-examples">
                        <li>Kompleksowy audyt prawny spółki IT przed rundą inwestycyjną</li>
                        <li>Wdrożenie systemu compliance zgodnego z RODO dla firmy handlowej (150 pracowników)</li>
                        <li>Przygotowanie regulaminu pracy i polityki antymobbingowej</li>
                        <li>Reprezentacja przed UODO w sprawie o naruszenie RODO</li>
                    </ul>

                    <div class="spec-cta">
                        <a href="oferta.html#compliance" class="btn btn-outline">Zobacz ofertę i cennik →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- ===== CTA ===== -->
<section class="cta-section">
    <div class="container">
        <div class="cta-inner reveal">
            <div class="cta-text">
                <h2>Nie znalazłeś<br><em>swojej sprawy?</em></h2>
                <p>Każda sprawa jest inna i wymaga indywidualnego podejścia. Skontaktuj się – pomogę Ci znaleźć najlepsze rozwiązanie.</p>
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
