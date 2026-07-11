<?php
/**
 * Title: Strona: Specjalizacje (cala tresc)
 * Slug: kancelaria-sadlowicz/strona-specjalizacje
 * Categories: kancelaria
 * Description: Hero, wstep i 8 specjalizacji (tekst + zdjecie naprzemiennie), CTA.
 */
$img = function ( $file ) { return esc_url( get_theme_file_uri( 'assets/images/' . $file ) ); };
$u   = function ( $path ) { return esc_url( home_url( $path ) ); };

$specs = array(
	array(
		'id'    => 'prawo-gospodarcze',
		'title' => 'Prawo <em>Gospodarcze</em>',
		'image' => '25.jpg',
		'alt'   => 'Prawo Gospodarcze - Kancelaria Adwokacka',
		'lead'  => 'Prawo gospodarcze to kompleksowa obsługa prawna przedsiębiorców na każdym etapie prowadzenia działalności - od rejestracji spółki, przez bieżące doradztwo, aż po reprezentację w sporach korporacyjnych.',
		'paras' => array(
			'Jako adwokat specjalizujący się w prawie gospodarczym oferuję pełne wsparcie dla spółek, zarządów i przedsiębiorców indywidualnych. Moje wieloletnie doświadczenie w obsłudze podmiotów gospodarczych pozwala mi skutecznie doradzać w najtrudniejszych sprawach biznesowych.',
			'Kompleksowo doradzam w kwestiach związanych z funkcjonowaniem spółek handlowych zgodnie z Kodeksem spółek handlowych (KSH), reprezentuję Zarządy przed organami nadzorczymi oraz wspieram w procesach restrukturyzacyjnych i przekształceniach organizacyjnych.',
			'Współpracuję zarówno z małymi firmami rodzinnymi, jak i dużymi korporacjami, dostosowując strategię prawną do specyfiki branży i potrzeb biznesowych klienta.',
		),
		'scope' => array(
			'Zakładanie i rejestracja spółek (sp. z o.o., S.A., spółki komandytowe, partnerskie)',
			'Doradztwo dla Zarządów w zakresie corporate governance',
			'Przygotowywanie i weryfikacja umów handlowych, kontraktów B2B',
			'Reprezentacja w sporach korporacyjnych i gospodarczych',
			'Obsługa przekształceń, fuzji i przejęć (M&amp;A)',
			'Due diligence prawne',
			'Compliance i audyt prawny spółek',
		),
		'cases' => array(
			'Obsługa prawna fuzji dwóch spółek z branży IT',
			'Reprezentacja Zarządu w postępowaniu przed KRS',
			'Przygotowanie umowy joint venture dla startupu technologicznego',
			'Windykacja należności B2B z tytułu niewykonanych kontraktów',
			'Doradztwo w procesie wyjścia wspólnika ze spółki',
		),
	),
	array(
		'id'    => 'restrukturyzacja',
		'title' => '<em>Restrukturyzacja</em>',
		'image' => '26.jpg',
		'alt'   => 'Restrukturyzacja - Kancelaria Adwokacka',
		'lead'  => 'Restrukturyzacja to szansa dla firm w kryzysie finansowym na odbudowę płynności i kontynuację działalności. Skutecznie reprezentuję zarówno dłużników, jak i wierzycieli w postępowaniach restrukturyzacyjnych i upadłościowych.',
		'paras' => array(
			'Oferuję kompleksową obsługę w sprawach restrukturyzacyjnych - od analizy sytuacji finansowej przedsiębiorstwa, przez przygotowanie wniosku o otwarcie postępowania, aż po negocjacje z wierzycielami i reprezentację na zgromadzeniach wierzycieli.',
			'Moje doświadczenie obejmuje zarówno postępowania sanacyjne (ratowanie firmy), jak i upadłościowe (likwidacja). Dzięki dogłębnej znajomości przepisów Prawa restrukturyzacyjnego oraz praktyce w prowadzeniu ok. 200 spraw rocznie, skutecznie wspieram klientów w najtrudniejszych momentach finansowych.',
			'Doradzam również wierzycielom w zakresie dochodzenia roszczeń w postępowaniach restrukturyzacyjnych i upadłościowych, maksymalizując szanse na odzyskanie należności.',
		),
		'scope' => array(
			'Analiza sytuacji finansowej i wybór optymalnej procedury',
			'Przygotowanie wniosku o otwarcie postępowania restrukturyzacyjnego',
			'Negocjacje układowe z wierzycielami',
			'Reprezentacja na zgromadzeniach wierzycieli',
			'Obsługa postępowań sanacyjnych i przyśpieszonych',
			'Doradztwo w postępowaniach upadłościowych (likwidacyjnych i konsumenckich)',
			'Reprezentacja wierzycieli - zgłaszanie i dochodzenie wierzytelności',
		),
		'cases' => array(
			'Skuteczne przeprowadzenie postępowania sanacyjnego dla spółki produkcyjnej',
			'Reprezentacja wierzycieli w układzie restrukturyzacyjnym',
			'Negocjacje układu z redukcją zadłużenia o 40%',
			'Obsługa postępowania upadłościowego konsumenckiego (oddłużenie)',
		),
	),
	array(
		'id'    => 'prawo-pracy',
		'title' => 'Prawo <em>Pracy</em>',
		'image' => '27.jpg',
		'alt'   => 'Prawo Pracy - Kancelaria Adwokacka',
		'lead'  => 'Prawo pracy to złożona dziedzina regulująca relacje pracownik-pracodawca. Reprezentuję zarówno pracowników dochodzących swoich praw, jak i pracodawców potrzebujących wsparcia w sporach pracowniczych i tworzeniu regulaminów wewnętrznych.',
		'paras' => array(
			'Skutecznie bronię interesów pracowników w sprawach o przywrócenie do pracy, odszkodowania za niezgodne z prawem rozwiązanie umowy, niewypłacone wynagrodzenia, mobbing oraz dyskryminację w miejscu pracy.',
			'Dla pracodawców oferuję kompleksowe doradztwo w zakresie tworzenia regulaminów pracy i wynagrodzeń, weryfikacji umów o pracę, przygotowania dokumentacji zwolnień (w tym zwolnień grupowych), reprezentacji przed sądami pracy oraz Państwową Inspekcją Pracy.',
			'Dzięki mojemu interdyscyplinarnemu wykształceniu (Prawo + Socjologia) rozumiem nie tylko aspekty prawne, ale także emocjonalne i społeczne konflikty w miejscu pracy, co pozwala mi skutecznie mediować i znajdować rozwiązania polubowne.',
		),
		'scope' => array(
			'Reprezentacja pracowników w sporach o przywrócenie do pracy',
			'Dochodzenie odszkodowań za niezgodne z prawem zwolnienie',
			'Sprawy o mobbing i dyskryminację w miejscu pracy',
			'Windykacja wynagrodzeń i innych należności pracowniczych',
			'Doradztwo dla pracodawców - regulaminy, umowy, zwolnienia',
			'Reprezentacja przed Państwową Inspekcją Pracy',
			'Mediacje i negocjacje ugodowe w sporach pracowniczych',
		),
		'cases' => array(
			'Skuteczne przywrócenie pracownika do pracy po bezprawnym zwolnieniu',
			'Wygrany proces o mobbing z odszkodowaniem 50 tys. zł',
			'Windykacja zaległych wynagrodzeń dla grupy pracowników',
			'Obsługa prawna zwolnień grupowych dla przedsiębiorstwa',
			'Negocjacje ugodowe w sporze o dyskryminację płacową',
		),
	),
	array(
		'id'    => 'windykacja',
		'title' => 'Windykacja <em>Należności</em>',
		'image' => '28.jpg',
		'alt'   => 'Windykacja Należności - Kancelaria Adwokacka',
		'lead'  => 'Windykacja należności to moja specjalizacja, w której osiągam około 80% skuteczności. Skutecznie odzyskuję należności dla przedsiębiorców, małych firm oraz osób prywatnych - zarówno drogą polubowną, jak i sądową.',
		'paras' => array(
			'Prowadzę kompleksowe procesy windykacyjne - od wezwań do zapłaty, przez postępowanie upominawcze i procesy sądowe, aż po egzekucję komorniczą. Dzięki biegłości w systemach sądowych oraz efektywnemu zarządzaniu referatem ok. 200 spraw rocznie, zapewniam szybkie i skuteczne odzyskiwanie należności.',
			'Oferuję elastyczne modele rozliczeń - zarówno stawkę stałą, jak i success fee (wynagrodzenie uzależnione od skuteczności windykacji), co pozwala dopasować współpracę do możliwości finansowych klienta.',
			'Specjalizuję się w windykacji należności B2B (między przedsiębiorcami), należności konsumenckich oraz należności z tytułu umów cywilnoprawnych. Prowadzę również sprawy o zapłatę w postępowaniach gospodarczych przed sądami okręgowymi.',
		),
		'scope' => array(
			'Windykacja polubowna - wezwania do zapłaty, negocjacje ugodowe',
			'Postępowanie upominawcze (szybkie uzyskanie nakazu zapłaty)',
			'Procesy sądowe o zapłatę (sprawy cywilne i gospodarcze)',
			'Egzekucja komornicza należności',
			'Windykacja należności B2B i konsumenckich',
			'Windykacja należności ze zleceń, umów o dzieło, pożyczek',
			'Reprezentacja w sprawach frankowych i kredytowych',
		),
		'cases' => array(
			'Odzyskanie 150 tys. zł dla firmy IT z tytułu niewykonanej umowy',
			'Skuteczna windykacja należności w postępowaniu upominawczym (3 tygodnie)',
			'Egzekucja komornicza z zabezpieczeniem na nieruchomości dłużnika',
			'Windykacja należności frankowych dla grupy kredytobiorców',
		),
	),
	array(
		'id'    => 'prawo-cywilne',
		'title' => 'Prawo Cywilne <em>i Rodzinne</em>',
		'image' => '29.jpg',
		'alt'   => 'Prawo Cywilne i Rodzinne - Kancelaria Adwokacka',
		'lead'  => 'Prawo cywilne i rodzinne to obszar, w którym łączę wiedzę prawniczą z empatią i zrozumieniem dla trudnych sytuacji życiowych klientów. Reprezentuję w sprawach rozwodowych, alimentacyjnych, spadkowych oraz odszkodowawczych.',
		'paras' => array(
			'Sprawy rodzinne to często najtrudniejsze emocjonalnie momenty w życiu - rozwody, separacje, walka o kontakty z dziećmi, alimenty. Moje interdyscyplinarne wykształcenie (Prawo + Socjologia) pozwala mi nie tylko skutecznie bronić Twoich interesów, ale również wspierać Cię emocjonalnie w tym trudnym czasie.',
			'W sprawach cywilnych reprezentuję klientów w procesach odszkodowawczych (wypadki komunikacyjne, błędy medyczne, szkody na osobie), sprawach spadkowych (stwierdzenie nabycia spadku, działy spadku, testamenty), oraz w sprawach dotyczących nieruchomości (roszczenia windykacyjne, zniesienie współwłasności).',
			'Zawsze staram się w pierwszej kolejności wypracować rozwiązania polubowne (ugody, mediacje), które oszczędzają czas, pieniądze i emocje. Jeśli jednak sprawa wymaga procesu sądowego - reprezentuję z pełnym zaangażowaniem.',
		),
		'scope' => array(
			'Rozwody i separacje (z orzekaniem o winie lub bez winy)',
			'Alimenty na dzieci i małżonka (ustalanie, podwyższanie, egzekucja)',
			'Kontakty z dziećmi, władza rodzicielska, miejsce zamieszkania dziecka',
			'Podział majątku wspólnego małżonków',
			'Sprawy spadkowe - stwierdzenie nabycia spadku, działy spadku, testamenty',
			'Odszkodowania za szkody osobowe i majątkowe (wypadki, błędy medyczne)',
			'Sprawy dotyczące nieruchomości (zniesienie współwłasności, roszczenia)',
		),
		'cases' => array(
			'Skuteczny rozwód z orzeczeniem o winie i wysokimi alimentami',
			'Wywalczenie rozszerzonych kontaktów ojca z dzieckiem',
			'Podział majątku wspólnego wartości 1,5 mln zł',
			'Odszkodowanie 200 tys. zł za wypadek komunikacyjny',
			'Dział spadku z nieruchomościami - ugoda polubowna',
		),
	),
	array(
		'id'    => 'wlasnosc-intelektualna',
		'title' => 'Prawo Własności <em>Intelektualnej</em>',
		'image' => '30.jpg',
		'alt'   => 'Prawo Własności Intelektualnej - Kancelaria Adwokacka',
		'lead'  => 'Prawo własności intelektualnej to dynamicznie rozwijająca się dziedzina, szczególnie w kontekście nowych technologii i sztucznej inteligencji. Oferuję kompleksowe doradztwo w zakresie ochrony praw autorskich, znaków towarowych oraz wykorzystania AI w biznesie.',
		'paras' => array(
			'W erze cyfryzacji i sztucznej inteligencji ochrona własności intelektualnej staje się kluczowa dla każdego przedsiębiorcy, twórcy czy startupu technologicznego. Doradzam w zakresie rejestracji znaków towarowych, patentów, ochrony praw autorskich do utworów (teksty, grafiki, muzyka, kod źródłowy), oraz w sprawach naruszeń IP.',
			'Specjalizuję się również w nowej, rozwijającej się dziedzinie - prawnych aspektach wykorzystania sztucznej inteligencji. Doradzam, jak legalnie wykorzystywać narzędzia AI w biznesie (ChatGPT, Midjourney, generatory treści), jakie są prawa autorskie do treści generowanych przez AI, oraz jak chronić własne utwory przed nieuprawnionym wykorzystaniem przez AI.',
			'Reprezentuję również w sporach o naruszenie praw autorskich, znaków towarowych oraz w sprawach dotyczących umów licencyjnych i cesji praw autorskich.',
		),
		'scope' => array(
			'Rejestracja znaków towarowych w EUIPO i UPRP',
			'Ochrona praw autorskich do utworów (teksty, grafiki, oprogramowanie)',
			'Doradztwo w zakresie legalnego wykorzystania AI w biznesie',
			'Przygotowywanie umów licencyjnych i cesji praw autorskich',
			'Reprezentacja w sporach o naruszenie praw autorskich i znaków towarowych',
			'Ochrona tajemnicy przedsiębiorstwa i know-how',
			'Audyt prawny w zakresie zgodności z przepisami o prawach autorskich',
		),
		'cases' => array(
			'Rejestracja znaku towarowego dla startupu technologicznego w UE',
			'Doradztwo w zakresie wykorzystania AI do generowania treści marketingowych',
			'Reprezentacja w sprawie o naruszenie praw autorskich do oprogramowania',
			'Przygotowanie polityki wykorzystania AI zgodnej z RODO i prawem autorskim',
		),
	),
	array(
		'id'    => 'prawo-ubezpieczeniowe',
		'title' => 'Prawo <em>Ubezpieczeniowe</em>',
		'image' => '31.jpg',
		'alt'   => 'Prawo Ubezpieczeniowe - Kancelaria Adwokacka',
		'lead'  => 'Prawo ubezpieczeniowe to obszar, w którym reprezentuję osoby poszkodowane w dochodzeniu roszczeń z ubezpieczeń komunikacyjnych (OC, AC), ubezpieczeń majątkowych, życiowych oraz zdrowotnych.',
		'paras' => array(
			'Towarzystwa ubezpieczeniowe często odmawiają wypłaty odszkodowań lub oferują zaniżone kwoty, licząc na brak wiedzy prawnej poszkodowanych. Skutecznie reprezentuję klientów w sporach z ubezpieczycielami - zarówno w postępowaniach przedsądowych (negocjacje, wezwania do zapłaty), jak i w procesach sądowych.',
			'Specjalizuję się w sprawach o odszkodowania z ubezpieczeń OC/AC po wypadkach komunikacyjnych, zadośćuczynienia za uszczerbek na zdrowiu, odszkodowań za szkody w nieruchomościach (zalania, pożary), oraz w sprawach dotyczących umów ubezpieczenia na życie.',
			'Dla przedsiębiorców oferuję również doradztwo przy zawieraniu umów ubezpieczenia (weryfikacja warunków, negocjacje składek), reprezentację w sprawach o wypłatę odszkodowań z ubezpieczeń biznesowych oraz w sporach dotyczących ubezpieczeń odpowiedzialności cywilnej (OC zawodowe, OC członków zarządu).',
		),
		'scope' => array(
			'Dochodzenie odszkodowań z ubezpieczeń OC/AC po wypadkach',
			'Zadośćuczynienia za uszczerbek na zdrowiu i szkody osobowe',
			'Odszkodowania za szkody w nieruchomościach (zalania, pożary, włamania)',
			'Reprezentacja w sporach z ubezpieczeniami życiowymi i zdrowotnymi',
			'Doradztwo przy zawieraniu umów ubezpieczenia dla firm',
			'Reprezentacja w sprawach dotyczących OC zawodowego i OC członków zarządu',
			'Negocjacje z likwidatorami szkód i rzeczoznawcami',
		),
		'cases' => array(
			'Wywalczone odszkodowanie 120 tys. zł za kolizję - ubezpieczyciel oferował 40 tys. zł',
			'Zadośćuczynienie 80 tys. zł za trwały uszczerbek na zdrowiu po wypadku',
			'Odszkodowanie za zalanie mieszkania - spór z administracją budynku',
			'Reprezentacja w sprawie o wypłatę z ubezpieczenia na życie (odmowa płatności)',
		),
	),
	array(
		'id'    => 'compliance',
		'title' => 'Compliance <em>i Audyt Prawny</em>',
		'image' => '32.jpg',
		'alt'   => 'Compliance i Audyt Prawny - Kancelaria Adwokacka',
		'lead'  => 'Compliance i audyt prawny to kluczowe obszary zarządzania ryzykiem prawnym w przedsiębiorstwach. Oferuję kompleksowe doradztwo w zakresie zgodności z przepisami prawa, tworzenia regulaminów wewnętrznych oraz audytu prawnego spółek.',
		'paras' => array(
			'W dzisiejszym dynamicznie zmieniającym się otoczeniu prawnym (RODO, prawo pracy, prawo gospodarcze, prawo konkurencji) przedsiębiorcy muszą na bieżąco dbać o zgodność swojej działalności z przepisami. Przeprowadzam kompleksowe audyty prawne, identyfikując obszary ryzyka i proponując konkretne rozwiązania.',
			'Specjalizuję się w tworzeniu regulaminów pracy, regulaminów wynagrodzeń, polityk RODO, procedur antykorupcyjnych, kodeksów etyki oraz innych dokumentów wewnętrznych dostosowanych do specyfiki branży i wielkości przedsiębiorstwa.',
			'Doradzam również w zakresie wdrażania systemów compliance (zapobieganie nieprawidłowościom, ochrona sygnalistów, procedury wewnętrzne), przeprowadzam szkolenia dla pracowników oraz wspieram w kontaktach z organami nadzorczymi (Inspekcja Pracy, UODO, UOKiK).',
		),
		'scope' => array(
			'Audyt prawny przedsiębiorstwa (identyfikacja ryzyk prawnych)',
			'Tworzenie regulaminów pracy, wynagrodzeń, ZFŚS',
			'Przygotowanie polityk RODO i wdrożenie zgodności z ochroną danych',
			'Procedury antykorupcyjne i kodeksy etyki',
			'Ochrona sygnalistów (whistleblowing) - procedury wewnętrzne',
			'Compliance w zakresie prawa konkurencji i zamówień publicznych',
			'Szkolenia dla pracowników z zakresu compliance i RODO',
		),
		'cases' => array(
			'Kompleksowy audyt prawny spółki IT przed rundą inwestycyjną',
			'Wdrożenie systemu compliance zgodnego z RODO dla firmy handlowej (150 pracowników)',
			'Przygotowanie regulaminu pracy i polityki antymobbingowej',
			'Reprezentacja przed UODO w sprawie o naruszenie RODO',
		),
	),
);
?>
<!-- wp:group {"tagName":"section","className":"page-hero"} -->
<section class="wp-block-group page-hero"><!-- wp:group {"className":"container"} -->
<div class="wp-block-group container"><!-- wp:paragraph {"className":"page-hero-eyebrow-text"} -->
<p class="page-hero-eyebrow-text">Kancelaria Adwokacka · Warszawa</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"className":"page-hero-title"} -->
<h1 class="wp-block-heading page-hero-title">Obszary <em>praktyki</em></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"page-hero-desc"} -->
<p class="page-hero-desc">Specjalizuję się w ośmiu kluczowych obszarach prawa, oferując kompleksową obsługę zarówno dla przedsiębiorców, jak i klientów indywidualnych. Wieloletnie doświadczenie, rzetelność i indywidualne podejście do każdej sprawy gwarantują skuteczne rozwiązanie Twoich problemów prawnych.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
<?php
foreach ( $specs as $i => $s ) :
	$alt_bg   = ( $i % 2 === 1 );
	$sec_cls  = $alt_bg ? 'section section-alt' : 'section';
	$img_side = ( $i % 2 === 1 ) ? 'left' : 'right';

	$text_col = '<!-- wp:column {"verticalAlignment":"center","width":"58%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:58%"><!-- wp:heading {"className":"section-title"} -->
<h2 class="wp-block-heading section-title">' . $s['title'] . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"ks-lead"} -->
<p class="ks-lead">' . $s['lead'] . '</p>
<!-- /wp:paragraph -->
';
	foreach ( $s['paras'] as $p ) {
		$text_col .= '
<!-- wp:paragraph -->
<p>' . $p . '</p>
<!-- /wp:paragraph -->
';
	}
	$text_col .= '
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Co obejmuje usługa:</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul class="wp-block-list">';
	foreach ( $s['scope'] as $item ) {
		$text_col .= '<!-- wp:list-item -->
<li>' . $item . '</li>
<!-- /wp:list-item -->

';
	}
	$text_col = rtrim( $text_col ) . '</ul>
<!-- /wp:list -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Przykłady spraw:</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul class="wp-block-list">';
	foreach ( $s['cases'] as $item ) {
		$text_col .= '<!-- wp:list-item -->
<li>' . $item . '</li>
<!-- /wp:list-item -->

';
	}
	$text_col = rtrim( $text_col ) . '</ul>
<!-- /wp:list -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-ks-navy"} -->
<div class="wp-block-button is-style-ks-navy"><a class="wp-block-button__link wp-element-button" href="' . $u( '/oferta/' ) . '">Zobacz ofertę i cennik</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->';

	$img_col = '<!-- wp:column {"verticalAlignment":"center","width":"42%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:42%"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="' . $img( $s['image'] ) . '" alt="' . esc_attr( $s['alt'] ) . '"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->';

	$cols = ( 'left' === $img_side ) ? $img_col . "\n\n" . $text_col : $text_col . "\n\n" . $img_col;
?>
<!-- wp:group {"tagName":"section","className":"<?php echo $sec_cls; ?>","anchor":"<?php echo $s['id']; ?>"} -->
<section class="wp-block-group <?php echo $sec_cls; ?>" id="<?php echo $s['id']; ?>"><!-- wp:group {"className":"container"} -->
<div class="wp-block-group container"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><?php echo $cols; ?></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
<?php endforeach; ?>

<!-- wp:group {"tagName":"section","className":"cta-section"} -->
<section class="wp-block-group cta-section"><!-- wp:group {"className":"container"} -->
<div class="wp-block-group container"><!-- wp:group {"className":"cta-inner"} -->
<div class="wp-block-group cta-inner"><!-- wp:group {"className":"cta-text"} -->
<div class="wp-block-group cta-text"><!-- wp:heading -->
<h2 class="wp-block-heading">Nie znalazłeś<br><em>swojej sprawy?</em></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Skontaktuj się - każda sprawa jest inna i wymaga indywidualnego podejścia.</p>
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
