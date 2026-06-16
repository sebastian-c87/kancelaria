<?php
defined('ABSPATH') || exit;

/* ------------------------------------------------------------------ */
/*  Theme setup                                                         */
/* ------------------------------------------------------------------ */
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-list', 'gallery', 'caption']);

    register_nav_menus([
        'primary' => 'Menu główne',
    ]);

    load_theme_textdomain('kancelaria-sadlowicz', get_template_directory() . '/languages');
});

/* ------------------------------------------------------------------ */
/*  Enqueue styles & scripts                                            */
/* ------------------------------------------------------------------ */
add_action('wp_enqueue_scripts', function () {
    $uri = get_template_directory_uri();
    $v   = '1.0.2';

    wp_enqueue_style('ks-google-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600&family=Jost:wght@300;400;500;600&display=swap',
        [], null
    );
    wp_enqueue_style('ks-redesign', $uri . '/assets/css/redesign.css', ['ks-google-fonts'], $v);

    if (!is_front_page()) {
        wp_enqueue_style('ks-subpages', $uri . '/assets/css/subpages.css', ['ks-redesign'], $v);
    }

    wp_enqueue_script('ks-custom', $uri . '/assets/js/custom.js', [], $v, true);

    if (is_page('kontakt')) {
        wp_localize_script('ks-custom', 'ksAjax', [
            'url'   => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('ks_contact_form'),
        ]);
    }
});

/* ------------------------------------------------------------------ */
/*  Helper: czy strona ma REALNĄ treść zbudowaną w Elementorze?         */
/*  Zwraca true tylko gdy Elementor jest włączony I coś w nim jest.     */
/*  Dzięki temu pusty Elementor NIE chowa oryginalnej treści szablonu.  */
/* ------------------------------------------------------------------ */
function ks_use_elementor_content($post_id = null): bool
{
    $post_id = $post_id ?: get_the_ID();
    if (!$post_id) {
        return false;
    }

    // W edytorze/podglądzie Elementora ZAWSZE udostępnij the_content(),
    // żeby Elementor wykrył obszar treści i pozwolił budować na pustej stronie.
    if (class_exists('\Elementor\Plugin')) {
        $el = \Elementor\Plugin::instance();
        if (isset($el->preview) && method_exists($el->preview, 'is_preview_mode')
            && $el->preview->is_preview_mode($post_id)) {
            return true;
        }
        if (isset($el->editor) && method_exists($el->editor, 'is_edit_mode')
            && $el->editor->is_edit_mode($post_id)) {
            return true;
        }
    }

    // Na żywej stronie: Elementor przejmuje tylko gdy faktycznie ma zbudowaną treść.
    if (get_post_meta($post_id, '_elementor_edit_mode', true) !== 'builder') {
        return false;
    }
    $data = get_post_meta($post_id, '_elementor_data', true);
    return !empty($data) && trim($data) !== '' && trim($data) !== '[]';
}

/* ------------------------------------------------------------------ */
/*  Elementor CSS: allow on Elementor-built pages, block elsewhere      */
/* ------------------------------------------------------------------ */
add_action('wp_enqueue_scripts', function () {
    $is_elementor = ks_use_elementor_content(get_queried_object_id());

    if (!$is_elementor) {
        wp_dequeue_style('elementor-frontend');
        wp_dequeue_style('e-theme-ui-light');
        wp_dequeue_style('elementor-common');
        wp_deregister_style('elementor-frontend');
        wp_deregister_style('e-theme-ui-light');
        wp_deregister_style('elementor-common');
    }
}, 100);

/* ------------------------------------------------------------------ */
/*  Remove WordPress <link> bloat from <head>                           */
/* ------------------------------------------------------------------ */
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');

/* ------------------------------------------------------------------ */
/*  Contact form AJAX handler (logged-out & logged-in)                  */
/* ------------------------------------------------------------------ */
add_action('wp_ajax_ks_contact',        'ks_handle_contact_form');
add_action('wp_ajax_nopriv_ks_contact', 'ks_handle_contact_form');

function ks_handle_contact_form(): void
{
    header('Content-Type: application/json; charset=utf-8');

    if (!check_ajax_referer('ks_contact_form', 'nonce', false)) {
        wp_send_json(['ok' => false, 'error' => 'Błąd bezpieczeństwa - odśwież stronę.'], 403);
    }

    // Honeypot
    if (!empty($_POST['website']) && preg_match('~https?://|www\.~i', $_POST['website'])) {
        wp_send_json(['ok' => true]);
    }

    // Sanitize
    $clean = fn(string $v): string => htmlspecialchars(strip_tags(trim($v)), ENT_QUOTES, 'UTF-8');

    $name     = $clean($_POST['name']     ?? '');
    $email    = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
    $phone    = $clean($_POST['phone']    ?? '');
    $category = $clean($_POST['category'] ?? '');
    $urgency  = $clean($_POST['urgency']  ?? '');
    $message  = $clean($_POST['message']  ?? '');

    if (!$name || !$email || !$message || !$category) {
        wp_send_json(['ok' => false, 'error' => 'Proszę wypełnić wszystkie wymagane pola.'], 400);
    }

    $categoryMap = [
        'prawo-rodzinne' => 'Prawo rodzinne',
        'prawo-spadkowe' => 'Prawo spadkowe',
        'prawo-cywilne'  => 'Prawo cywilne',
        'windykacja'     => 'Windykacja należności',
        'prawo-pracy'    => 'Prawo pracy',
        'prawo-karne'    => 'Prawo karne',
        'inne'           => 'Inna sprawa',
    ];
    $urgencyMap = [
        'standard'    => 'Standardowa (24-48h)',
        'urgent'      => 'Pilna (kilka dni)',
        'very-urgent' => 'Bardzo pilna (termin)',
    ];

    $categoryLabel = $categoryMap[$category] ?? $category;
    $urgencyLabel  = $urgencyMap[$urgency]   ?? $urgency;

    // SMTP config
    $smtp_host = 'serwer2684968.hosting-home.pl';
    $smtp_port = 465;
    $smtp_user = 'kontakt@kancelaria-sadlowicz.pl';
    $smtp_pass = 'Czerwiec123!';
    $mail_to   = 'kamila.sadlowicz@kancelaria-sadlowicz.pl';

    $subject = 'Nowe zapytanie: ' . $name . ' - ' . $categoryLabel;

    $body  = "Nowe zapytanie z formularza kontaktowego\n";
    $body .= "=========================================\n\n";
    $body .= "Imie i nazwisko : {$name}\n";
    $body .= "Email           : {$email}\n";
    $body .= "Telefon         : " . ($phone ?: '(nie podano)') . "\n";
    $body .= "Kategoria       : {$categoryLabel}\n";
    $body .= "Pilnosc         : {$urgencyLabel}\n\n";
    $body .= "Tresc wiadomosci\n";
    $body .= "----------------\n";
    $body .= $message . "\n\n";
    $body .= "----------------\n";
    $body .= "Data: " . wp_date('d.m.Y H:i') . "  |  IP: " . ($_SERVER['REMOTE_ADDR'] ?? '-') . "\n";

    $result = ks_smtp_send($smtp_host, $smtp_port, $smtp_user, $smtp_pass,
        $smtp_user, $mail_to, $email, $subject, $body);

    if ($result['ok']) {
        wp_send_json(['ok' => true]);
    } else {
        wp_send_json([
            'ok'    => false,
            'error' => 'Błąd wysyłki. Napisz bezpośrednio: kamila.sadlowicz@kancelaria-sadlowicz.pl. Szczegóły: ' . $result['error'],
        ], 500);
    }
}

/* ------------------------------------------------------------------ */
/*  ACF helper - pobierz pole z fallbackiem, zawsze escaped             */
/* ------------------------------------------------------------------ */
function ks_field(string $name, string $default = ''): string
{
    if (!function_exists('get_field')) return esc_html($default);
    $v = get_field($name);
    return esc_html(!empty($v) ? $v : $default);
}

/* ------------------------------------------------------------------ */
/*  ACF: Definicja pól dla strony "O mnie"                             */
/* ------------------------------------------------------------------ */
add_action('acf/init', function () {
    if (!function_exists('acf_add_local_field_group')) return;

    // Dynamiczne ID strony "O mnie" po slugu - działa na staging i produkcji.
    $omnie    = get_page_by_path('o-mnie');
    $omnie_id = $omnie ? $omnie->ID : 0;

    acf_add_local_field_group([
        'key'   => 'group_ks_omnie',
        'title' => 'Strona „O mnie" - treści',
        'fields' => [

            // ── Tab: Bio ──────────────────────────────────────────
            ['key' => 'field_ks_omnie_tab_bio', 'label' => 'Bio', 'type' => 'tab'],
            [
                'key'           => 'field_ks_omnie_lead',
                'label'         => 'Akapit wprowadzający (wyróżniony)',
                'name'          => 'lead_paragraph',
                'type'          => 'textarea',
                'rows'          => 2,
                'instructions'  => 'Pierwsza kursywa / wyróżniony akapit pod zdjęciem.',
                'default_value' => 'Prawo to nie tylko zawód - to moje powołanie. Od początku kariery kieruję się zasadą, że każdy klient zasługuje na rzetelną, indywidualną pomoc prawną.',
            ],

            // ── Tab: Statystyki ───────────────────────────────────
            ['key' => 'field_ks_omnie_tab_stats', 'label' => 'Statystyki', 'type' => 'tab'],
            ['key' => 'field_ks_omnie_stat1_num', 'label' => 'Liczba 1',   'name' => 'stat_1_number', 'type' => 'text', 'default_value' => '12+'],
            ['key' => 'field_ks_omnie_stat1_lbl', 'label' => 'Opis 1',     'name' => 'stat_1_label',  'type' => 'text', 'default_value' => 'lat doświadczenia'],
            ['key' => 'field_ks_omnie_stat2_num', 'label' => 'Liczba 2',   'name' => 'stat_2_number', 'type' => 'text', 'default_value' => '200'],
            ['key' => 'field_ks_omnie_stat2_lbl', 'label' => 'Opis 2',     'name' => 'stat_2_label',  'type' => 'text', 'default_value' => 'spraw rocznie'],
            ['key' => 'field_ks_omnie_stat3_num', 'label' => 'Liczba 3',   'name' => 'stat_3_number', 'type' => 'text', 'default_value' => '~80%'],
            ['key' => 'field_ks_omnie_stat3_lbl', 'label' => 'Opis 3',     'name' => 'stat_3_label',  'type' => 'text', 'default_value' => 'skuteczności w windykacji'],
            ['key' => 'field_ks_omnie_stat4_num', 'label' => 'Liczba 4',   'name' => 'stat_4_number', 'type' => 'text', 'default_value' => '500+'],
            ['key' => 'field_ks_omnie_stat4_lbl', 'label' => 'Opis 4',     'name' => 'stat_4_label',  'type' => 'text', 'default_value' => 'klientów obsłużonych'],

            // ── Tab: Wartości ─────────────────────────────────────
            ['key' => 'field_ks_omnie_tab_vals', 'label' => 'Wartości', 'type' => 'tab'],
            ['key' => 'field_ks_omnie_val1_ttl', 'label' => 'Wartość 1 - tytuł', 'name' => 'value_1_title', 'type' => 'text',     'default_value' => 'Rzetelność'],
            ['key' => 'field_ks_omnie_val1_txt', 'label' => 'Wartość 1 - tekst', 'name' => 'value_1_text',  'type' => 'textarea', 'rows' => 2,
                'default_value' => 'Każda sprawa wymaga pełnego zaangażowania i dokładnej analizy. Daję Ci rzetelną ocenę sytuacji - nawet jeśli nie jest to to, co chciałbyś usłyszeć.'],
            ['key' => 'field_ks_omnie_val2_ttl', 'label' => 'Wartość 2 - tytuł', 'name' => 'value_2_title', 'type' => 'text',     'default_value' => 'Dostępność'],
            ['key' => 'field_ks_omnie_val2_txt', 'label' => 'Wartość 2 - tekst', 'name' => 'value_2_text',  'type' => 'textarea', 'rows' => 2,
                'default_value' => 'Odpowiadam na maile w ciągu 24 godzin roboczych. Wiem, że w sprawach prawnych czas często ma kluczowe znaczenie - dlatego nie zostawiam klientów bez odpowiedzi.'],
            ['key' => 'field_ks_omnie_val3_ttl', 'label' => 'Wartość 3 - tytuł', 'name' => 'value_3_title', 'type' => 'text',     'default_value' => 'Indywidualne podejście'],
            ['key' => 'field_ks_omnie_val3_txt', 'label' => 'Wartość 3 - tekst', 'name' => 'value_3_text',  'type' => 'textarea', 'rows' => 2,
                'default_value' => 'Każdy klient i każda sprawa jest inna. Nie stosuję szablonowych rozwiązań - słucham, analizuję i dobieram strategię dopasowaną do Twojej konkretnej sytuacji.'],

            // ── Tab: Wykształcenie ────────────────────────────────
            ['key' => 'field_ks_omnie_tab_edu', 'label' => 'Wykształcenie', 'type' => 'tab'],
            ['key' => 'field_ks_omnie_edu1_yr',  'label' => 'Poz. 1 - rok',   'name' => 'edu_1_year',  'type' => 'text', 'default_value' => '2020'],
            ['key' => 'field_ks_omnie_edu1_ttl', 'label' => 'Poz. 1 - tytuł', 'name' => 'edu_1_title', 'type' => 'text', 'default_value' => 'Egzamin adwokacki - wynik pozytywny'],
            ['key' => 'field_ks_omnie_edu1_dsc', 'label' => 'Poz. 1 - opis',  'name' => 'edu_1_desc',  'type' => 'text', 'default_value' => 'Okręgowa Rada Adwokacka w Warszawie · wpis nr WAW/ADW/9453'],
            ['key' => 'field_ks_omnie_edu2_yr',  'label' => 'Poz. 2 - rok',   'name' => 'edu_2_year',  'type' => 'text', 'default_value' => '2017 - 2019'],
            ['key' => 'field_ks_omnie_edu2_ttl', 'label' => 'Poz. 2 - tytuł', 'name' => 'edu_2_title', 'type' => 'text', 'default_value' => 'Aplikacja adwokacka'],
            ['key' => 'field_ks_omnie_edu2_dsc', 'label' => 'Poz. 2 - opis',  'name' => 'edu_2_desc',  'type' => 'text', 'default_value' => 'ORA w Warszawie · starosta grupy aplikacyjnej · Samorząd Aplikantów Adwokackich'],
            ['key' => 'field_ks_omnie_edu3_yr',  'label' => 'Poz. 3 - rok',   'name' => 'edu_3_year',  'type' => 'text', 'default_value' => '2011 - 2014'],
            ['key' => 'field_ks_omnie_edu3_ttl', 'label' => 'Poz. 3 - tytuł', 'name' => 'edu_3_title', 'type' => 'text', 'default_value' => 'Magister prawa'],
            ['key' => 'field_ks_omnie_edu3_dsc', 'label' => 'Poz. 3 - opis',  'name' => 'edu_3_desc',  'type' => 'text', 'default_value' => 'Uniwersytet SWPS, Warszawa'],
            ['key' => 'field_ks_omnie_edu4_yr',  'label' => 'Poz. 4 - rok',   'name' => 'edu_4_year',  'type' => 'text', 'default_value' => '2008 - 2010'],
            ['key' => 'field_ks_omnie_edu4_ttl', 'label' => 'Poz. 4 - tytuł', 'name' => 'edu_4_title', 'type' => 'text', 'default_value' => 'Magister socjologii'],
            ['key' => 'field_ks_omnie_edu4_dsc', 'label' => 'Poz. 4 - opis',  'name' => 'edu_4_desc',  'type' => 'text', 'default_value' => 'SGGW, Warszawa · spec. Komunikowanie społeczne i doradztwo'],

            // ── Tab: Doświadczenie ────────────────────────────────
            ['key' => 'field_ks_omnie_tab_exp', 'label' => 'Doświadczenie', 'type' => 'tab'],
            ['key' => 'field_ks_omnie_exp1_yr',  'label' => 'Poz. 1 - rok',   'name' => 'exp_1_year',  'type' => 'text', 'default_value' => '2020 - dziś'],
            ['key' => 'field_ks_omnie_exp1_ttl', 'label' => 'Poz. 1 - tytuł', 'name' => 'exp_1_title', 'type' => 'text', 'default_value' => 'Kancelaria Adwokacka Kamila Sadłowicz'],
            ['key' => 'field_ks_omnie_exp1_dsc', 'label' => 'Poz. 1 - opis',  'name' => 'exp_1_desc',  'type' => 'textarea', 'rows' => 2,
                'default_value' => 'Samodzielna praktyka · 150-200 spraw rocznie · prawo gospodarcze, cywilne, pracy, windykacja, restrukturyzacja · sądy wszystkich instancji'],
            ['key' => 'field_ks_omnie_exp2_yr',  'label' => 'Poz. 2 - rok',   'name' => 'exp_2_year',  'type' => 'text', 'default_value' => '2017 - 2020'],
            ['key' => 'field_ks_omnie_exp2_ttl', 'label' => 'Poz. 2 - tytuł', 'name' => 'exp_2_title', 'type' => 'text', 'default_value' => 'Aplikant adwokacki - Jerschina-Fus, Radtke-Cichocka Sp. J.'],
            ['key' => 'field_ks_omnie_exp2_dsc', 'label' => 'Poz. 2 - opis',  'name' => 'exp_2_desc',  'type' => 'textarea', 'rows' => 2,
                'default_value' => 'Warszawa · obsługa branży ochrony i automotive · pisma procesowe, zastępstwa sądowe, koncesje MSWiA i ABW'],
            ['key' => 'field_ks_omnie_exp3_yr',  'label' => 'Poz. 3 - rok',   'name' => 'exp_3_year',  'type' => 'text', 'default_value' => '2011 - 2013'],
            ['key' => 'field_ks_omnie_exp3_ttl', 'label' => 'Poz. 3 - tytuł', 'name' => 'exp_3_title', 'type' => 'text', 'default_value' => 'Asystent prawny - PROFESSIO Kancelaria Prawnicza / Saturn TFI S.A.'],
            ['key' => 'field_ks_omnie_exp3_dsc', 'label' => 'Poz. 3 - opis',  'name' => 'exp_3_desc',  'type' => 'textarea', 'rows' => 2,
                'default_value' => 'Warszawa · pisma procesowe w sprawach cywilnych i pracowniczych · zarządzanie sekretariatem kancelarii'],

            // ── Tab: Członkostwa ──────────────────────────────────
            ['key' => 'field_ks_omnie_tab_mem', 'label' => 'Członkostwa', 'type' => 'tab'],
            ['key' => 'field_ks_omnie_mem1_ttl', 'label' => 'Pole 1 - tytuł', 'name' => 'mem_1_title', 'type' => 'text', 'default_value' => 'Okręgowa Rada Adwokacka w Warszawie'],
            ['key' => 'field_ks_omnie_mem1_txt', 'label' => 'Pole 1 - tekst', 'name' => 'mem_1_text',  'type' => 'textarea', 'rows' => 2,
                'default_value' => 'Adwokat wpisana na listę adwokatów ORA w Warszawie od 2020 r.'],
            ['key' => 'field_ks_omnie_mem2_ttl', 'label' => 'Pole 2 - tytuł', 'name' => 'mem_2_title', 'type' => 'text', 'default_value' => 'Samorząd Aplikantów Adwokackich'],
            ['key' => 'field_ks_omnie_mem2_txt', 'label' => 'Pole 2 - tekst', 'name' => 'mem_2_text',  'type' => 'textarea', 'rows' => 2,
                'default_value' => 'Członek Samorządu Aplikantów Adwokackich ORA Warszawa przez cały okres aplikacji (2017-2019) · starosta grupy aplikacyjnej'],
            ['key' => 'field_ks_omnie_mem3_ttl', 'label' => 'Pole 3 - tytuł', 'name' => 'mem_3_title', 'type' => 'text', 'default_value' => 'Certyfikaty i szkolenia'],
            ['key' => 'field_ks_omnie_mem3_txt', 'label' => 'Pole 3 - tekst', 'name' => 'mem_3_text',  'type' => 'textarea', 'rows' => 2,
                'default_value' => 'Certyfikat AML - obowiązki instytucji obowiązanych (GIIF) · Ochrona Zarządu przed egzekucją (PTPiGR)'],
        ],
        'location'        => [[['param' => 'page', 'operator' => '==', 'value' => (string) $omnie_id]]],
        'position'        => 'normal',
        'label_placement' => 'top',
    ]);
});

/* ------------------------------------------------------------------ */

/* ------------------------------------------------------------------ */
/*  ACF helpers dla tabel i list (format: jeden wiersz = jedna pozycja) */
/* ------------------------------------------------------------------ */

/** Surowa wartość pola ACF (bez escapowania - escapujemy per-komórka). */
function ks_raw(string $name): string
{
    if (!function_exists('get_field')) return '';
    $v = get_field($name);
    return is_string($v) ? $v : '';
}

/**
 * Buduje wiersze <tr> z pola tekstowego.
 * Każda linia = wiersz; kolumny oddzielone znakiem "|".
 * $bold = indeks kolumny owijanej w <strong> (-1 = brak).
 * Dozwolone tagi HTML w komórkach: <strong>, <em>.
 */
function ks_table_rows(string $name, int $cols, int $bold = 1): string
{
    $raw = ks_raw($name);
    if ($raw === '') return '';
    $allowed = ['strong' => [], 'em' => []];
    $out = '';
    foreach (preg_split('/\r\n|\r|\n/', $raw) as $line) {
        $line = trim($line);
        if ($line === '') continue;
        $cells = array_map('trim', explode('|', $line));
        $out .= '<tr>';
        for ($i = 0; $i < $cols; $i++) {
            $val = wp_kses($cells[$i] ?? '', $allowed);
            $out .= '<td>' . ($i === $bold ? "<strong>{$val}</strong>" : $val) . '</td>';
        }
        $out .= '</tr>';
    }
    return $out;
}

/**
 * Buduje pozycje <li> z pola tekstowego (jedna linia = jeden punkt).
 * Dozwolone tagi HTML w pozycjach: <strong>, <em>, <a>.
 */
function ks_list_items(string $name, bool $check = false): string
{
    $raw = ks_raw($name);
    if ($raw === '') return '';
    $allowed = ['strong' => [], 'em' => [], 'a' => ['href' => [], 'target' => []]];
    $out = '';
    foreach (preg_split('/\r\n|\r|\n/', $raw) as $line) {
        $line = trim($line);
        if ($line === '') continue;
        $out .= '<li>' . ($check ? '✅ ' : '') . wp_kses($line, $allowed) . '</li>';
    }
    return $out;
}

/* ------------------------------------------------------------------ */
/*  ACF: Definicja pól dla strony "Oferta i Cennik"                    */
/* ------------------------------------------------------------------ */
add_action('acf/init', function () {
    if (!function_exists('acf_add_local_field_group')) return;

    $oferta    = get_page_by_path('oferta');
    $oferta_id = $oferta ? $oferta->ID : 0;

    $tbl_hint  = 'Jeden wiersz = jedna pozycja w tabeli. Kolumny oddziel znakiem | (pionowa kreska).';
    $list_hint = 'Jeden wiersz = jeden punkt listy.';

    acf_add_local_field_group([
        'key'   => 'group_ks_oferta',
        'title' => 'Strona „Oferta i Cennik" - treści',
        'fields' => [

            // ── Tab: Wstęp ────────────────────────────────────────
            ['key' => 'field_ks_of_tab_intro', 'label' => 'Wstęp', 'type' => 'tab'],
            ['key' => 'field_ks_of_lead', 'label' => 'Akapit wyróżniony', 'name' => 'oferta_intro_lead', 'type' => 'textarea', 'rows' => 3,
                'default_value' => 'Oferuję kompleksową obsługę prawną dostosowaną do potrzeb klientów indywidualnych i firm. Każda sprawa jest inna, dlatego po wstępnej konsultacji przedstawiam szczegółową wycenę dopasowaną do skali i złożoności problemu.'],
            ['key' => 'field_ks_of_text', 'label' => 'Akapit drugi', 'name' => 'oferta_intro_text', 'type' => 'textarea', 'rows' => 3,
                'default_value' => 'Poniższy cennik oparty jest na Rozporządzeniu Ministra Sprawiedliwości oraz praktyce rynkowej w Warszawie (stan na 2026 rok). Wszystkie kwoty podane są netto + VAT 23%.'],

            // ── Tab: Konsultacje ──────────────────────────────────
            ['key' => 'field_ks_of_tab_kons', 'label' => 'Konsultacje', 'type' => 'tab'],
            ['key' => 'field_ks_of_kons', 'label' => 'Tabela konsultacji (Usługa | Stawka | Uwagi)', 'name' => 'oferta_konsultacje', 'type' => 'textarea', 'rows' => 6, 'instructions' => $tbl_hint,
                'default_value' => implode("\n", [
                    'Porada prawna (60 min.) - osobiście | 350-500 zł | Analiza sprawy, ocena szans, plan działania',
                    'Porada online/telefoniczna (60 min.) | 350 zł | Wideo/telefon, materiały wysyłane mailowo',
                    'Porada ekspresowa (30 min.) | 200-300 zł | Krótka konsultacja, szybka odpowiedź',
                    'Opinia prawna pisemna (do 5 stron A4) | 1.000-1.500 zł | Szczegółowa analiza + pisemne rekomendacje',
                    'Analiza dokumentacji (za godzinę) | 300-400 zł | Przegląd umów, pism, akt sprawy',
                ])],
            ['key' => 'field_ks_of_kons_info', 'label' => 'Dodatkowe informacje (lista)', 'name' => 'oferta_konsultacje_info', 'type' => 'textarea', 'rows' => 3, 'instructions' => $list_hint,
                'default_value' => implode("\n", [
                    'Pierwsza konsultacja zaliczana na poczet dalszej współpracy (jeśli zdecydujesz się na reprezentację)',
                    'Przygotowanie dokumentów przez klienta = maksymalne wykorzystanie czasu',
                    'Możliwość konsultacji w weekend (dodatkowa opłata +30%)',
                ])],

            // ── Tab: Pakiet START ─────────────────────────────────
            ['key' => 'field_ks_of_tab_start', 'label' => 'Pakiet START', 'type' => 'tab'],
            ['key' => 'field_ks_pkg_start_name', 'label' => 'Nazwa',  'name' => 'pkg_start_name',  'type' => 'text', 'default_value' => 'PAKIET START'],
            ['key' => 'field_ks_pkg_start_price','label' => 'Cena',   'name' => 'pkg_start_price', 'type' => 'text', 'default_value' => '800 zł/mc'],
            ['key' => 'field_ks_pkg_start_dla',  'label' => 'Dla kogo','name' => 'pkg_start_dla',   'type' => 'text', 'default_value' => 'Mikrofirmy, freelancerzy, start-upy (1-5 pracowników)'],
            ['key' => 'field_ks_pkg_start_obj',  'label' => 'Co obejmuje (lista)', 'name' => 'pkg_start_obejmuje', 'type' => 'textarea', 'rows' => 6, 'instructions' => $list_hint,
                'default_value' => implode("\n", [
                    'Konsultacje telefoniczne i mailowe - do 2 godzin miesięcznie',
                    'Przegląd i opiniowanie do 3 umów miesięcznie (standardowych, do 5 stron)',
                    'Pomoc w sporządzaniu prostych pism (odpowiedzi na reklamacje)',
                    'Do 2 wezwań do zapłaty miesięcznie (prosta windykacja)',
                    '1 konsultacja z zakresu prawa pracy (umowy zlecenia, B2B)',
                    'Czas odpowiedzi: do 24h (dni robocze)',
                ])],
            ['key' => 'field_ks_pkg_start_nie',  'label' => 'NIE obejmuje (lista)', 'name' => 'pkg_start_nieobejmuje', 'type' => 'textarea', 'rows' => 3, 'instructions' => $list_hint,
                'default_value' => implode("\n", [
                    'Reprezentacji sądowej (rozliczana osobno)',
                    'Sporządzania umów (tylko przegląd!)',
                    'Obsługi postępowań administracyjnych i KRS',
                ])],
            ['key' => 'field_ks_pkg_start_godz', 'label' => 'Dodatkowe godziny', 'name' => 'pkg_start_godziny', 'type' => 'text', 'default_value' => '300 zł/h'],

            // ── Tab: Pakiet BIZNES ────────────────────────────────
            ['key' => 'field_ks_of_tab_biznes', 'label' => 'Pakiet BIZNES', 'type' => 'tab'],
            ['key' => 'field_ks_pkg_biz_name', 'label' => 'Nazwa',  'name' => 'pkg_biznes_name',  'type' => 'text', 'default_value' => 'PAKIET BIZNES'],
            ['key' => 'field_ks_pkg_biz_price','label' => 'Cena',   'name' => 'pkg_biznes_price', 'type' => 'text', 'default_value' => '1.800 zł/mc'],
            ['key' => 'field_ks_pkg_biz_dla',  'label' => 'Dla kogo','name' => 'pkg_biznes_dla',   'type' => 'text', 'default_value' => 'Małe i średnie firmy (5-25 pracowników)'],
            ['key' => 'field_ks_pkg_biz_obj',  'label' => 'Co obejmuje (lista)', 'name' => 'pkg_biznes_obejmuje', 'type' => 'textarea', 'rows' => 11, 'instructions' => $list_hint,
                'default_value' => implode("\n", [
                    'Konsultacje telefoniczne i mailowe - do 4 godzin miesięcznie (odpowiedź do 12h w dni robocze)',
                    'Przegląd i opiniowanie do 8 umów (do 10 stron każda)',
                    'Sporządzanie do 3 umów standardowych (B2B, NDA, zlecenia, umowy o pracę)',
                    'Do 5 wezwań do zapłaty miesięcznie (windykacja należności)',
                    'Kompleksowe doradztwo z zakresu prawa pracy (umowy, regulaminy, zwolnienia)',
                    'Reprezentacja w negocjacjach (do 2 spotkań/mc)',
                    'Przegląd korespondencji prawnej (odpowiedzi na wezwania, reklamacje)',
                    'Audyt prawny 1x na pół roku (compliance, RODO, umowy)',
                    'Czas odpowiedzi: do 12h (dni robocze)',
                    'Priorytetowy kontakt (dedykowany numer telefonu)',
                    'Rabat 15% na sprawy sądowe',
                ])],
            ['key' => 'field_ks_pkg_biz_nie',  'label' => 'NIE obejmuje (lista)', 'name' => 'pkg_biznes_nieobejmuje', 'type' => 'textarea', 'rows' => 2, 'instructions' => $list_hint,
                'default_value' => implode("\n", [
                    'Reprezentacji sądowej (rozliczana osobno z rabatem 15%)',
                    'Obsługi spraw KRS (płatne osobno z rabatem 15%)',
                ])],
            ['key' => 'field_ks_pkg_biz_godz', 'label' => 'Dodatkowe godziny', 'name' => 'pkg_biznes_godziny', 'type' => 'text', 'default_value' => '280 zł/h'],

            // ── Tab: Pakiet PROFESJONALNY ─────────────────────────
            ['key' => 'field_ks_of_tab_prof', 'label' => 'Pakiet PROFESJONALNY', 'type' => 'tab'],
            ['key' => 'field_ks_pkg_prof_name', 'label' => 'Nazwa',  'name' => 'pkg_prof_name',  'type' => 'text', 'default_value' => 'PAKIET PROFESJONALNY'],
            ['key' => 'field_ks_pkg_prof_price','label' => 'Cena',   'name' => 'pkg_prof_price', 'type' => 'text', 'default_value' => '4.200 zł/mc'],
            ['key' => 'field_ks_pkg_prof_dla',  'label' => 'Dla kogo','name' => 'pkg_prof_dla',   'type' => 'text', 'default_value' => 'Średnie i duże firmy (25-100 pracowników), spółki z zarządem'],
            ['key' => 'field_ks_pkg_prof_obj',  'label' => 'Co obejmuje (lista)', 'name' => 'pkg_prof_obejmuje', 'type' => 'textarea', 'rows' => 13, 'instructions' => $list_hint,
                'default_value' => implode("\n", [
                    'Konsultacje telefoniczne, mailowe i wideo - do 10 godzin miesięcznie (odpowiedź do 6h w dni robocze)',
                    'Przegląd i opiniowanie do 15 umów (niezależnie od objętości)',
                    'Sporządzanie do 5 złożonych umów (inwestycyjne, joint-venture, licencje, franchising)',
                    'Do 10 wezwań do zapłaty miesięcznie (kompleksowa windykacja)',
                    'Kompleksowe doradztwo z zakresu prawa pracy (zwolnienia grupowe, kontrole PIP, spory)',
                    'Pełna obsługa KRS i zmian korporacyjnych (uchwały, zmiany umów spółek, raporty)',
                    'Reprezentacja w negocjacjach biznesowych (do 4 spotkań/mc)',
                    'Audyt prawny 2x/rok (RODO, compliance, umowy, regulaminy)',
                    'Wsparcie w postępowaniach administracyjnych (UOKiK, UODO, ZUS, US)',
                    'Comiesięczne raporty (podsumowanie obsługi, statystyki, rekomendacje)',
                    'Czas odpowiedzi: do 6h (dni robocze)',
                    'Dedykowany opiekun prawny (stały kontakt, znajomość specyfiki firmy)',
                    'Rabat 20% na sprawy sądowe',
                ])],
            ['key' => 'field_ks_pkg_prof_nie',  'label' => 'NIE obejmuje (lista)', 'name' => 'pkg_prof_nieobejmuje', 'type' => 'textarea', 'rows' => 2, 'instructions' => $list_hint,
                'default_value' => 'Reprezentacji sądowej w sporach o wartości powyżej 50.000 zł (rozliczana osobno z rabatem 20%)'],
            ['key' => 'field_ks_pkg_prof_godz', 'label' => 'Dodatkowe godziny', 'name' => 'pkg_prof_godziny', 'type' => 'text', 'default_value' => '250 zł/h'],

            // ── Tab: Pakiet PREMIUM ───────────────────────────────
            ['key' => 'field_ks_of_tab_prem', 'label' => 'Pakiet PREMIUM', 'type' => 'tab'],
            ['key' => 'field_ks_pkg_prem_name', 'label' => 'Nazwa',  'name' => 'pkg_premium_name',  'type' => 'text', 'default_value' => 'PAKIET PREMIUM'],
            ['key' => 'field_ks_pkg_prem_price','label' => 'Cena',   'name' => 'pkg_premium_price', 'type' => 'text', 'default_value' => 'od 8.000 zł/mc'],
            ['key' => 'field_ks_pkg_prem_dla',  'label' => 'Dla kogo','name' => 'pkg_premium_dla',   'type' => 'text', 'default_value' => 'Duże korporacje, spółki giełdowe, grupy kapitałowe (100+ pracowników)'],
            ['key' => 'field_ks_pkg_prem_obj',  'label' => 'Co obejmuje (lista)', 'name' => 'pkg_premium_obejmuje', 'type' => 'textarea', 'rows' => 10, 'instructions' => $list_hint,
                'default_value' => implode("\n", [
                    'Pełna obsługa prawna in-house (prawnik dedykowany wyłącznie dla klienta)',
                    'Konsultacje telefoniczne, mailowe, wideo i stacjonarne - zakres ustalany indywidualnie; możliwość kontaktu w pilnych sytuacjach poza godzinami pracy',
                    'Konsultacje strategiczne z zarządem (uczestnictwo w posiedzeniach zarządu)',
                    'Kompleksowa obsługa korporacyjna (zmiany struktury spółek, przekształcenia, uchwały)',
                    'Reprezentacja w postępowaniach sądowych (do 3 spraw jednocześnie w ramach pakietu)',
                    'Kompleksowa windykacja należności w ramach pakietu (wezwania, pozwy, egzekucje)',
                    'Zarządzanie ryzykiem prawnym (audyty kwartalne, compliance)',
                    'Comiesięczne spotkania strategiczne (prezentacja stanu spraw, analiza ryzyka)',
                    'Szkolenia wewnętrzne dla pracowników (RODO, prawo pracy, compliance - 2x/rok)',
                    'Rabat 30% na wszystkie sprawy poza pakietem',
                ])],
            ['key' => 'field_ks_pkg_prem_godz', 'label' => 'Dodatkowe godziny', 'name' => 'pkg_premium_godziny', 'type' => 'text', 'default_value' => '220 zł/h'],
            ['key' => 'field_ks_pkg_prem_note', 'label' => 'Notatka (Zakres negocjowalny)', 'name' => 'pkg_premium_note', 'type' => 'text',
                'default_value' => 'Możliwość stworzenia pakietu na miarę (np. tylko obsługa korporacyjna bez spraw pracowniczych)'],

            // ── Tab: Sprawy Rodzinne ──────────────────────────────
            ['key' => 'field_ks_of_tab_rodz', 'label' => 'Sprawy Rodzinne', 'type' => 'tab'],
            ['key' => 'field_ks_of_rodz', 'label' => 'Tabela (Element | Stawka | Uwagi)', 'name' => 'oferta_rodzinne', 'type' => 'textarea', 'rows' => 13, 'instructions' => $tbl_hint,
                'default_value' => implode("\n", [
                    'Opłata sądowa od pozwu rozwodowego | 600 zł | Stała w całej Polsce, obowiązkowa',
                    'Opłata skarbowa za pełnomocnictwo | 17 zł | Przy reprezentacji sądowej',
                    'Sporządzenie pozwu rozwodowego | 1.000-1.500 zł | Zależnie od skomplikowania',
                    'Rozwód za porozumieniem stron (cała sprawa) | 3.000-3.500 zł | Szybsze i tańsze, bez sporu',
                    'Rozwód z orzekaniem o winie (cała sprawa) | 8.000-15.000 zł | Dłuższe postępowanie, wielokrotne rozprawy, świadkowie; cena zależy od liczby posiedzeń',
                    'Podział majątku wspólnego (pozew) | 2.000-4.000 zł | Zależnie od wartości majątku',
                    'Ustalenie alimentów (pozew + reprezentacja) | 1.500-2.000 zł | Prostsza sprawa',
                    'Zmiana wysokości alimentów | 1.000-1.500 zł | Przy zmianie sytuacji życiowej',
                    'Egzekucja alimentów (komornik + reprezentacja) | 1.000-1.500 zł | Windykacja zaległych alimentów',
                    'Kontakty z dzieckiem (pozew) | 2.000-2.500 zł | Ustalenie harmonogramu kontaktów',
                    'Władza rodzicielska (ograniczenie/pozbawienie) | 2.500-4.000 zł | Wymaga dowodów, często opinie psychologiczne',
                    'Separacja (pozew + reprezentacja) | 2.500-3.500 zł | Podobnie jak rozwód',
                    'Reprezentacja na 1 rozprawie (bez pozwu) | 1.000-1.200 zł | Jednorazowe zlecenie',
                ])],
            ['key' => 'field_ks_of_rodz_stawki', 'label' => 'Info-box: Stawki minimalne (lista)', 'name' => 'oferta_rodzinne_stawki', 'type' => 'textarea', 'rows' => 4, 'instructions' => $list_hint,
                'default_value' => implode("\n", [
                    'Sprawy o rozwód: <strong>720 zł</strong>',
                    'Sprawy o alimenty: <strong>240 zł</strong>',
                    'Sprawy o podział majątku: <strong>50% stawki wg wartości udziału</strong>',
                ])],
            ['key' => 'field_ks_of_rodz_dod', 'label' => 'Info-box: Dodatkowe usługi (lista)', 'name' => 'oferta_rodzinne_dodatkowe', 'type' => 'textarea', 'rows' => 5, 'instructions' => $list_hint,
                'default_value' => implode("\n", [
                    'Mediacje rozwodowe - <strong>500-1.500 zł</strong> (opcjonalnie przed procesem, często skuteczniejsze)',
                    'Pomoc w sprawie alimentów za granicą (UE) - wycena indywidualna',
                    'Reprezentacja w postępowaniu apelacyjnym - <strong>+50% stawki z I instancji</strong>',
                    'Koszty opinii biegłego (rodzinna/psychologiczna) - pokrywa strona na zlecenie sądu; wynagrodzenie biegłego ustala sąd',
                ])],

            // ── Tab: Windykacja ───────────────────────────────────
            ['key' => 'field_ks_of_tab_wind', 'label' => 'Windykacja', 'type' => 'tab'],
            ['key' => 'field_ks_of_wind', 'label' => 'Tabela (Etap/wartość | Honorarium | Uwagi)', 'name' => 'oferta_windykacja', 'type' => 'textarea', 'rows' => 6, 'instructions' => $tbl_hint,
                'default_value' => implode("\n", [
                    'Wezwanie do zapłaty (pozasądowe) | 300-700 zł | Wezwanie, negocjacje, prosta windykacja (przeważnie do 3.000 zł wartości)',
                    'Postępowanie sądowe (do 5.000 zł) | 1.500-2.500 zł | Postępowanie uproszczone lub EPU (nakaz zapłaty)',
                    'Postępowanie sądowe (5.000-20.000 zł) | 2.500-5.000 zł | Postępowanie zwykłe (I instancja)',
                    'Postępowanie sądowe (20.000-100.000 zł) | 5.000-10.000 zł | Złożone sprawy; dłuższy czas postępowania',
                    'Postępowanie sądowe (100.000-500.000 zł) | 10.000-18.000 zł | Biznesowe sprawy windykacyjne; szczegółowa wycena po analizie akt',
                    'Powyżej 500.000 zł | wycena indywidualna | Wstępna ocena na konsultacji',
                ])],
            ['key' => 'field_ks_of_wind_p1', 'label' => 'Info-box: Opis honorarium (akapit)', 'name' => 'oferta_wind_honor_p1', 'type' => 'textarea', 'rows' => 2,
                'default_value' => 'Wynagrodzenie w sprawach windykacyjnych może składać się z dwóch elementów:'],
            ['key' => 'field_ks_of_wind_lista', 'label' => 'Info-box: Elementy honorarium (lista)', 'name' => 'oferta_wind_honor_lista', 'type' => 'textarea', 'rows' => 5, 'instructions' => $list_hint,
                'default_value' => implode("\n", [
                    '<strong>Honorarium stałe</strong> - wymagane zawsze, niezależnie od wyniku sprawy; obejmuje wszystkie czynności prawnika na każdym etapie; płatne zgodnie z harmonogramem ustalonym w umowie',
                    '<strong>Prowizja windykacyjna (success fee)</strong> - opcjonalny element dodatkowy, uzgadniany indywidualnie; stanowi % od faktycznie odzyskanej kwoty; płatna wyłącznie po wpływie środków na konto klienta; wynosi orientacyjnie 5-15% (maleje wraz ze wzrostem wartości należności)',
                ])],
            ['key' => 'field_ks_of_wind_p2', 'label' => 'Info-box: Uwaga o prowizji (akapit)', 'name' => 'oferta_wind_honor_p2', 'type' => 'textarea', 'rows' => 3,
                'default_value' => '<strong>Prowizja windykacyjna jest zawsze uzupełnieniem honorarium stałego</strong> - nigdy jego zamiennikiem. Wynika to z zasad etyki adwokackiej. Szczegółowy model wynagrodzenia ustalany jest przed podpisaniem umowy.'],
            ['key' => 'field_ks_of_wind_etapy', 'label' => 'Info-box: Tabela etapów (Etap | Honorarium | Orientacyjny czas)', 'name' => 'oferta_wind_etapy', 'type' => 'textarea', 'rows' => 4, 'instructions' => $tbl_hint,
                'default_value' => implode("\n", [
                    'Wezwanie do zapłaty (pozasądowe) | <strong>300-700 zł</strong> | 3-7 dni',
                    'Pozew + reprezentacja w sądzie (I instancja) | Wg tabeli powyżej | kilka - kilkanaście miesięcy',
                    'Postępowanie egzekucyjne (komornik) | <strong>800-2.000 zł</strong> (honorarium za obsługę egzekucji); opłata komornicza ok. 15% wyegzekwowanej kwoty - płaci dłużnik | kilka - kilkanaście miesięcy',
                ])],
            ['key' => 'field_ks_of_wind_abon', 'label' => 'Info-box: W ramach abonamentu (lista)', 'name' => 'oferta_wind_abon', 'type' => 'textarea', 'rows' => 4, 'instructions' => $list_hint,
                'default_value' => implode("\n", [
                    'BIZNES: do 5 wezwań do zapłaty miesięcznie w cenie pakietu',
                    'PROFESJONALNY: do 10 wezwań do zapłaty miesięcznie w cenie pakietu',
                    'PREMIUM: obsługa windykacyjna wg zakresu uzgodnionego indywidualnie',
                ])],

            // ── Tab: Sprawy Karne ─────────────────────────────────
            ['key' => 'field_ks_of_tab_karne', 'label' => 'Sprawy Karne', 'type' => 'tab'],
            ['key' => 'field_ks_of_karne', 'label' => 'Tabela (Postępowanie | Stawka | Min. stawka | Uwagi)', 'name' => 'oferta_karne', 'type' => 'textarea', 'rows' => 8, 'instructions' => $tbl_hint,
                'default_value' => implode("\n", [
                    'Przed sądem rejonowym (I instancja) | 2.000-3.000 zł | 600 zł | Zależnie od stopnia skomplikowania',
                    'Przed sądem okręgowym (I instancja) | 3.500-5.000 zł | 840 zł | Poważniejsze przestępstwa',
                    'Postępowanie apelacyjne | 4.000-6.000 zł | 960 zł | Odwołanie od wyroku',
                    'Postępowanie przygotowawcze (prokuratura) | 2.000-2.500 zł | 600 zł | Obecność na przesłuchaniach, analiza akt',
                    'Udział w jednej rozprawie (bez pozwu) | 1.000-1.200 zł | - | Jednorazowe zlecenie',
                    'Sporządzenie apelacji (bez reprezentacji) | 2.000-2.500 zł | - | Sam dokument, bez udziału w rozprawie',
                    'Obrona w sprawach o wykroczenia | 1.000 zł | - | Mandaty karne, drobne sprawy',
                    'Obrona w sprawach gospodarczych (I instancja) | 5.000-10.000 zł | 1.200 zł | Przestępstwa skarbowe, wyłudzenia VAT',
                ])],
            ['key' => 'field_ks_of_karne_info', 'label' => 'Info-box: Dodatkowe informacje (lista)', 'name' => 'oferta_karne_info', 'type' => 'textarea', 'rows' => 3, 'instructions' => $list_hint,
                'default_value' => 'Koszty opinii biegłych (psychiatryczne, grafologiczne i inne) - pokrywa strona na zlecenie sądu; wynagrodzenie biegłego ustala sąd'],

            // ── Tab: Prawo Gospodarcze ────────────────────────────
            ['key' => 'field_ks_of_tab_gosp', 'label' => 'Prawo Gospodarcze', 'type' => 'tab'],
            ['key' => 'field_ks_of_gosp', 'label' => 'Tabela (Usługa | Stawka | Uwagi)', 'name' => 'oferta_gospodarcze', 'type' => 'textarea', 'rows' => 10, 'instructions' => $tbl_hint,
                'default_value' => implode("\n", [
                    'Sporządzenie umowy (standardowa, do 5 stron) | 800-1.200 zł | B2B, zlecenia, NDA, umowy o pracę',
                    'Sporządzenie umowy (złożona, 5-15 stron) | 2.000-3.500 zł | Inwestycyjne, licencje, joint-venture, franchising',
                    'Przegląd i opiniowanie umowy | 600-1.000 zł | Sprawdzenie, uwagi prawne, rekomendacje zmian',
                    'Negocjacje umowne (za godzinę) | 400 zł | Reprezentacja w negocjacjach biznesowych',
                    'Opinia prawna (do 5 stron A4) | 1.000-1.500 zł | Analiza prawna + pisemne rekomendacje',
                    'Regulamin pracy/RODO/OZE | 1.500-2.500 zł | Dostosowanie do aktualnych przepisów',
                    'Obsługa zmian w KRS | 800-1.200 zł | Uchwały, zmiany umów spółek, nowi wspólnicy',
                    'Sporządzenie uchwał zarządu/wspólników | 500-700 zł | Standardowe dokumenty korporacyjne',
                    'Reprezentacja na Zgromadzeniu Wspólników | 1.500-2.500 zł | Obecność prawnika, wsparcie zarządu',
                    'Compliance i audyt RODO | 3.000-8.000 zł | Przegląd zgodności z przepisami + raport',
                ])],
            ['key' => 'field_ks_of_gosp_info', 'label' => 'Info-box: Dodatkowe informacje (lista)', 'name' => 'oferta_gosp_info', 'type' => 'textarea', 'rows' => 3, 'instructions' => $list_hint,
                'default_value' => 'W ramach abonamentu BIZNES/PROFESJONALNY: część usług w cenie pakietu'],

            // ── Tab: Reprezentacja Sądowa ─────────────────────────
            ['key' => 'field_ks_of_tab_repr', 'label' => 'Reprezentacja Sądowa', 'type' => 'tab'],
            ['key' => 'field_ks_of_repr', 'label' => 'Tabela (Wartość sporu | Stawka | Min. stawka | Zakres)', 'name' => 'oferta_reprezentacja', 'type' => 'textarea', 'rows' => 6, 'instructions' => $tbl_hint,
                'default_value' => implode("\n", [
                    'do 2.000 zł | 1.500 zł | 180 zł | Cała sprawa (I instancja)',
                    '2.000-5.000 zł | 2.000-2.500 zł | 300 zł | Cała sprawa',
                    '5.000-10.000 zł | 3.000-3.500 zł | 600 zł | Cała sprawa',
                    '10.000-50.000 zł | 5.000-7.000 zł | 1.200 zł | Cała sprawa',
                    '50.000-200.000 zł | 10.000-12.000 zł | 3.600 zł | Cała sprawa',
                    'powyżej 200.000 zł | indywidualnie | 10.800 zł | Negocjacje z klientem',
                ])],
            ['key' => 'field_ks_of_repr_zakres', 'label' => 'Info-box: Zakres "cała sprawa" (lista)', 'name' => 'oferta_repr_zakres', 'type' => 'textarea', 'rows' => 6, 'instructions' => $list_hint,
                'default_value' => implode("\n", [
                    'Sporządzenie pozwu lub odpowiedzi na pozew',
                    'Udział we <strong>wszystkich</strong> rozprawach (także posiedzeniach przygotowawczych)',
                    'Sporządzanie pism procesowych (wnioski dowodowe, repliki, dupliki)',
                    'Kontakt z klientem przez cały czas trwania sprawy (mailowy/telefoniczny)',
                    'Analiza dokumentacji i przygotowanie strategii procesowej',
                ])],
            ['key' => 'field_ks_of_repr_apel', 'label' => 'Info-box: Apelacja - stawka', 'name' => 'oferta_repr_apelacja', 'type' => 'text',
                'default_value' => '+50% stawki z I instancji'],
            ['key' => 'field_ks_of_repr_info', 'label' => 'Info-box: Dodatkowe informacje (lista)', 'name' => 'oferta_repr_info', 'type' => 'textarea', 'rows' => 4, 'instructions' => $list_hint,
                'default_value' => implode("\n", [
                    'Udział w jednej rozprawie (bez kompleksowej obsługi): <strong>1.000-1.200 zł</strong>',
                    'W przypadku ugody sądowej: rabat 20% (sprawa kończy się szybciej)',
                    'Klienci abonamentowi: rabaty 15-30% (zależnie od pakietu)',
                ])],

            // ── Tab: Tabela porównawcza ───────────────────────────
            ['key' => 'field_ks_of_tab_porown', 'label' => 'Tabela porównawcza', 'type' => 'tab'],
            ['key' => 'field_ks_of_porown', 'label' => 'Tabela (Element | START | BIZNES | PROFESJONALNY | PREMIUM)', 'name' => 'oferta_porownanie',
                'type' => 'textarea', 'rows' => 14,
                'instructions' => 'Jeden wiersz = jeden wiersz tabeli. 5 kolumn oddzielone | (pionowa kreska). Pierwsza kolumna (Element) jest automatycznie pogrubiona.',
                'default_value' => implode("\n", [
                    'Cena/mc | 800 zł | 1.800 zł | 4.200 zł | od 8.000 zł',
                    'Konsultacje tel./mailowe | Do 2 godz./mc | Do 4 godz./mc | Do 10 godz./mc | Ustalane indywidualnie',
                    'Przegląd umów/mc | 3 umowy | 8 umów | 15 umów | Wg potrzeb (ustalane z klientem)',
                    'Sporządzanie umów | - | Do 3/mc | Do 5/mc | Wg potrzeb (ustalane z klientem)',
                    'Wezwania do zapłaty | Do 2/mc | Do 5/mc | Do 10/mc | Wg potrzeb (ustalane z klientem)',
                    'Prawo pracy | 1 konsultacja/mc | Doradztwo w bieżących sprawach pracowniczych | Kompleksowa obsługa | Pełna obsługa + szkolenia',
                    'Reprezentacja w negocjacjach | - | Do 2 spotkań/mc | Do 4 spotkań/mc | Wg potrzeb (ustalane z klientem)',
                    'Obsługa KRS | - | Płatne z rabatem 15% | Zmiany, uchwały | Pełna obsługa',
                    'Audyt prawny | - | 1x/pół roku | 2x/rok | 4x/rok',
                    'Czas odpowiedzi | Do 24h | Do 12h | Do 6h | Do 2h (pilne natychmiast)',
                    'Rabat na sprawy sądowe | - | 15% | 20% | 30%',
                    'Dodatkowa godzina | 300 zł | 280 zł | 250 zł | 220 zł',
                ])],
            ['key' => 'field_ks_of_abon_info', 'label' => 'Info-box pod tabelą (lista)', 'name' => 'oferta_abon_info', 'type' => 'textarea', 'rows' => 4, 'instructions' => $list_hint,
                'default_value' => implode("\n", [
                    'Abonament na czas nieokreślony z <strong>1-miesięcznym okresem wypowiedzenia</strong>',
                    'Możliwość abonamentu na czas określony (6 lub 12 miesięcy) z <strong>rabatem 10-15%</strong>',
                    "Możliwość upgrade'u pakietu w każdej chwili (różnica ceny za bieżący miesiąc)",
                ])],

            // ── Tab: Opłaty Sądowe ────────────────────────────────
            ['key' => 'field_ks_of_tab_oplaty', 'label' => 'Opłaty Sądowe', 'type' => 'tab'],
            ['key' => 'field_ks_of_oplsad', 'label' => 'Tabela opłat sądowych (Rodzaj | Opłata)', 'name' => 'oferta_oplaty_sadowe', 'type' => 'textarea', 'rows' => 12,
                'instructions' => 'Jeden wiersz = jeden wiersz. Format: Rodzaj sprawy | Opłata sądowa. Kolumna "Opłata" jest automatycznie pogrubiona.',
                'default_value' => implode("\n", [
                    'Pozew rozwodowy | 600 zł (opłata stała, art. 26 uksc)',
                    'Pozew o alimenty (strona dochodząca) | zwolniona z opłaty (art. 96 ust. 1 pkt 2 uksc)',
                    'Sprawy cywilne - do 500 zł | 30 zł',
                    'Sprawy cywilne - 500-1.500 zł | 100 zł',
                    'Sprawy cywilne - 1.500-4.000 zł | 200 zł',
                    'Sprawy cywilne - 4.000-7.500 zł | 400 zł',
                    'Sprawy cywilne - 7.500-10.000 zł | 500 zł',
                    'Sprawy cywilne - 10.000-15.000 zł | 750 zł',
                    'Sprawy cywilne - 15.000-20.000 zł | 1.000 zł',
                    'Sprawy cywilne - powyżej 20.000 zł | 5% wartości sporu (max 100.000 zł)',
                ])],
            ['key' => 'field_ks_of_innekoszt', 'label' => 'Inne koszty (Element | Koszt | Uwagi)', 'name' => 'oferta_inne_koszty', 'type' => 'textarea', 'rows' => 7, 'instructions' => $tbl_hint,
                'default_value' => implode("\n", [
                    'Opłata skarbowa za pełnomocnictwo | 17 zł | Obowiązkowa przy reprezentacji',
                    'Opinia biegłego sądowego | kwotę ustala sąd | Zlecana przez sąd, pokrywa strona; wysokość zależy od specjalności biegłego i zakresu opinii',
                    'Tłumaczenia przysięgłe | wycena indywidualna | Zależnie od języka, objętości i tłumacza przysięgłego',
                    'Koszty doręczeń | 20-50 zł/pismo | Doręczenia komornicze',
                    'Mediacje | 500-1.500 zł | Opcjonalnie przed procesem',
                ])],
            ['key' => 'field_ks_of_warning', 'label' => 'Ważne - lista (box ostrzeżeń)', 'name' => 'oferta_warning', 'type' => 'textarea', 'rows' => 4, 'instructions' => $list_hint,
                'default_value' => implode("\n", [
                    'Jeśli <strong>wygrasz sprawę</strong> - sąd może zasądzić zwrot kosztów od przeciwnika (w tym Twoje wynagrodzenie prawnika)',
                    'Jeśli <strong>przegrasz</strong> - możesz ponieść koszty przeciwnika (jego prawnik + opłaty sądowe)',
                    'Przed rozpoczęciem sprawy <strong>zawsze</strong> informuję o potencjalnych kosztach i ryzyku',
                ])],

            // ── Tab: FAQ ──────────────────────────────────────────
            ['key' => 'field_ks_of_tab_faq', 'label' => 'FAQ', 'type' => 'tab',
                'instructions' => 'Aby usunąć pytanie: wyczyść oba pola (Pytanie i Odpowiedź) - puste pary są pomijane. Aby dodać nowe: wypełnij kolejne puste pola (do 10 par).'],
            ['key' => 'field_ks_faq1_q', 'label' => 'Pytanie 1', 'name' => 'faq_1_q', 'type' => 'text',
                'default_value' => 'Dlaczego ceny są podawane w przedziałach?'],
            ['key' => 'field_ks_faq1_a', 'label' => 'Odpowiedź 1', 'name' => 'faq_1_a', 'type' => 'textarea', 'rows' => 4,
                'default_value' => 'Każda sprawa jest inna - wycena zależy od skomplikowania, wartości sporu, ilości dokumentów i przewidywanego czasu pracy. Po wstępnej konsultacji przedstawiam <strong>szczegółową wycenę</strong> z rozbiciem na poszczególne etapy.'],
            ['key' => 'field_ks_faq2_q', 'label' => 'Pytanie 2', 'name' => 'faq_2_q', 'type' => 'text',
                'default_value' => 'Czy można negocjować ceny?'],
            ['key' => 'field_ks_faq2_a', 'label' => 'Odpowiedź 2', 'name' => 'faq_2_a', 'type' => 'textarea', 'rows' => 4,
                'default_value' => 'Tak! W przypadku <strong>długotrwałej współpracy</strong>, <strong>większej liczby spraw</strong> lub <strong>poleceń od obecnych klientów</strong> oferuję rabaty do 20%. Klienci abonamentowi mają gwarantowane rabaty 15-30%.'],
            ['key' => 'field_ks_faq3_q', 'label' => 'Pytanie 3', 'name' => 'faq_3_q', 'type' => 'text',
                'default_value' => 'Czy mogę rozłożyć płatność na raty?'],
            ['key' => 'field_ks_faq3_a', 'label' => 'Odpowiedź 3', 'name' => 'faq_3_a', 'type' => 'textarea', 'rows' => 4,
                'default_value' => 'Tak, w przypadku spraw długotrwałych (rozwody, duże windykacje) możliwa płatność ratalna: <strong>zaliczka 30-50%</strong> + raty miesięczne przez czas trwania sprawy.'],
            ['key' => 'field_ks_faq4_q', 'label' => 'Pytanie 4', 'name' => 'faq_4_q', 'type' => 'text',
                'default_value' => 'Co się stanie jeśli przegram sprawę?'],
            ['key' => 'field_ks_faq4_a', 'label' => 'Odpowiedź 4', 'name' => 'faq_4_a', 'type' => 'textarea', 'rows' => 4,
                'default_value' => 'Wynagrodzenie za reprezentację <strong>nie zależy</strong> od wyniku sprawy (chyba że ustaliliśmy model success fee w windykacji). Jeśli przegrasz, sąd może zasądzić <strong>zwrot kosztów przeciwnika</strong> (jego prawnik + opłaty sądowe). O tym ryzyku informuję <strong>przed</strong> rozpoczęciem sprawy i oceniam szanse powodzenia.'],
            ['key' => 'field_ks_faq5_q', 'label' => 'Pytanie 5', 'name' => 'faq_5_q', 'type' => 'text',
                'default_value' => 'Czy konsultacja jest płatna?'],
            ['key' => 'field_ks_faq5_a', 'label' => 'Odpowiedź 5', 'name' => 'faq_5_a', 'type' => 'textarea', 'rows' => 4,
                'default_value' => 'Pierwsza konsultacja (60 min) - <strong>350-500 zł</strong>. Jeśli zdecydujesz się na dalszą współpracę (reprezentację w sprawie), <strong>zaliczam ją na poczet wynagrodzenia</strong>. Oferuję również <strong>krótką bezpłatną rozmowę wstępną</strong> (ok. 10-15 min, telefon/online) - żeby sprawdzić, czy mogę Ci pomóc, zanim zdecydujesz się na płatną konsultację.'],
            ['key' => 'field_ks_faq6_q', 'label' => 'Pytanie 6', 'name' => 'faq_6_q', 'type' => 'text',
                'default_value' => 'Czy abonament można rozwiązać w każdej chwili?'],
            ['key' => 'field_ks_faq6_a', 'label' => 'Odpowiedź 6', 'name' => 'faq_6_a', 'type' => 'textarea', 'rows' => 4,
                'default_value' => 'Tak! Abonament na czas nieokreślony z <strong>1-miesięcznym okresem wypowiedzenia</strong>. Możesz też wybrać abonament na czas określony (6 lub 12 miesięcy) z <strong>rabatem 10-15%</strong>.'],
            ['key' => 'field_ks_faq7_q', 'label' => 'Pytanie 7', 'name' => 'faq_7_q', 'type' => 'text',
                'default_value' => 'Co jeśli wykorzystam wszystkie godziny w pakiecie abonamentowym?'],
            ['key' => 'field_ks_faq7_a', 'label' => 'Odpowiedź 7', 'name' => 'faq_7_a', 'type' => 'textarea', 'rows' => 4,
                'default_value' => 'Możesz dokupić dodatkowe godziny w preferencyjnej stawce (zależnie od pakietu: 220-300 zł/h). Alternatywnie - niewykorzystane godziny <strong>przechodzą na następny miesiąc</strong> (max. 2 miesiące wstecz).'],
            ['key' => 'field_ks_faq8_q', 'label' => 'Pytanie 8', 'name' => 'faq_8_q', 'type' => 'text',
                'default_value' => 'Czy wynagrodzenie obejmuje koszty sądowe?'],
            ['key' => 'field_ks_faq8_a', 'label' => 'Odpowiedź 8', 'name' => 'faq_8_a', 'type' => 'textarea', 'rows' => 4,
                'default_value' => '<strong>NIE.</strong> Moje wynagrodzenie to koszt obsługi prawnej. Dodatkowo musisz pokryć: opłaty sądowe (600 zł za rozwód, 5% wartości sporu w sprawach cywilnych itd.), opinie biegłych, tłumaczenia. Zawsze informuję o <strong>pełnych kosztach</strong> przed rozpoczęciem sprawy.'],
            ['key' => 'field_ks_faq9_q', 'label' => 'Pytanie 9 (opcjonalne)', 'name' => 'faq_9_q', 'type' => 'text', 'default_value' => ''],
            ['key' => 'field_ks_faq9_a', 'label' => 'Odpowiedź 9 (opcjonalna)', 'name' => 'faq_9_a', 'type' => 'textarea', 'rows' => 4, 'default_value' => ''],
            ['key' => 'field_ks_faq10_q', 'label' => 'Pytanie 10 (opcjonalne)', 'name' => 'faq_10_q', 'type' => 'text', 'default_value' => ''],
            ['key' => 'field_ks_faq10_a', 'label' => 'Odpowiedź 10 (opcjonalna)', 'name' => 'faq_10_a', 'type' => 'textarea', 'rows' => 4, 'default_value' => ''],
        ],
        'location'        => [[['param' => 'page', 'operator' => '==', 'value' => (string) $oferta_id]]],
        'position'        => 'normal',
        'label_placement' => 'top',
    ]);
});

/* ------------------------------------------------------------------ */

function ks_smtp_send(string $host, int $port, string $user, string $pass,
                      string $from, string $to, string $reply_to,
                      string $subject, string $body): array
{
    $socket = @stream_socket_client("ssl://{$host}:{$port}", $errno, $errstr, 15, STREAM_CLIENT_CONNECT);
    if (!$socket) {
        return ['ok' => false, 'error' => "Połączenie SMTP nieudane: {$errstr} ({$errno})"];
    }

    stream_set_timeout($socket, 10);

    $read = function () use ($socket): string {
        $out = '';
        while ($line = fgets($socket, 512)) {
            $out .= $line;
            if (isset($line[3]) && $line[3] === ' ') break;
        }
        return $out;
    };

    $cmd = function (string $c) use ($socket, $read): string {
        fputs($socket, $c . "\r\n");
        return $read();
    };

    $r = $read();
    if (substr($r, 0, 3) !== '220') { fclose($socket); return ['ok' => false, 'error' => "Brak powitania: {$r}"]; }

    $r = $cmd('EHLO ' . ($_SERVER['HTTP_HOST'] ?? 'kancelaria-sadlowicz.pl'));
    if (substr($r, 0, 3) !== '250') { fclose($socket); return ['ok' => false, 'error' => "EHLO: {$r}"]; }

    $r = $cmd('AUTH LOGIN');
    if (substr($r, 0, 3) !== '334') { fclose($socket); return ['ok' => false, 'error' => "AUTH LOGIN: {$r}"]; }

    $r = $cmd(base64_encode($user));
    if (substr($r, 0, 3) !== '334') { fclose($socket); return ['ok' => false, 'error' => "AUTH user: {$r}"]; }

    $r = $cmd(base64_encode($pass));
    if (substr($r, 0, 3) !== '235') { fclose($socket); return ['ok' => false, 'error' => "AUTH haslo: {$r}"]; }

    $r = $cmd("MAIL FROM:<{$from}>");
    if (substr($r, 0, 3) !== '250') { fclose($socket); return ['ok' => false, 'error' => "MAIL FROM: {$r}"]; }

    $r = $cmd("RCPT TO:<{$to}>");
    if (substr($r, 0, 3) !== '250') { fclose($socket); return ['ok' => false, 'error' => "RCPT TO: {$r}"]; }

    $r = $cmd('DATA');
    if (substr($r, 0, 3) !== '354') { fclose($socket); return ['ok' => false, 'error' => "DATA: {$r}"]; }

    $enc_subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
    $msg  = "Date: " . wp_date('r') . "\r\n";
    $msg .= "From: \"Formularz kancelaria\" <{$from}>\r\n";
    $msg .= "To: <{$to}>\r\n";
    $msg .= "Reply-To: <{$reply_to}>\r\n";
    $msg .= "Subject: {$enc_subject}\r\n";
    $msg .= "MIME-Version: 1.0\r\n";
    $msg .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $msg .= "Content-Transfer-Encoding: base64\r\n";
    $msg .= "\r\n";
    $msg .= chunk_split(base64_encode($body));
    $msg .= "\r\n.";

    $r = $cmd($msg);
    if (substr($r, 0, 3) !== '250') { fclose($socket); return ['ok' => false, 'error' => "Wysylka: {$r}"]; }

    $cmd('QUIT');
    fclose($socket);
    return ['ok' => true];
}
