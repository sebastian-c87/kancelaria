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
        wp_send_json(['ok' => false, 'error' => 'Błąd bezpieczeństwa – odśwież stronę.'], 403);
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
/*  ACF helper – pobierz pole z fallbackiem, zawsze escaped             */
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

    acf_add_local_field_group([
        'key'   => 'group_ks_omnie',
        'title' => 'Strona „O mnie" – treści',
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
                'default_value' => 'Prawo to nie tylko zawód – to moje powołanie. Od początku kariery kieruję się zasadą, że każdy klient zasługuje na rzetelną, indywidualną pomoc prawną.',
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
            ['key' => 'field_ks_omnie_val1_ttl', 'label' => 'Wartość 1 – tytuł', 'name' => 'value_1_title', 'type' => 'text',     'default_value' => 'Rzetelność'],
            ['key' => 'field_ks_omnie_val1_txt', 'label' => 'Wartość 1 – tekst', 'name' => 'value_1_text',  'type' => 'textarea', 'rows' => 2,
                'default_value' => 'Każda sprawa wymaga pełnego zaangażowania i dokładnej analizy. Daję Ci rzetelną ocenę sytuacji – nawet jeśli nie jest to to, co chciałbyś usłyszeć.'],
            ['key' => 'field_ks_omnie_val2_ttl', 'label' => 'Wartość 2 – tytuł', 'name' => 'value_2_title', 'type' => 'text',     'default_value' => 'Dostępność'],
            ['key' => 'field_ks_omnie_val2_txt', 'label' => 'Wartość 2 – tekst', 'name' => 'value_2_text',  'type' => 'textarea', 'rows' => 2,
                'default_value' => 'Odpowiadam na maile w ciągu 24 godzin roboczych. Wiem, że w sprawach prawnych czas często ma kluczowe znaczenie – dlatego nie zostawiam klientów bez odpowiedzi.'],
            ['key' => 'field_ks_omnie_val3_ttl', 'label' => 'Wartość 3 – tytuł', 'name' => 'value_3_title', 'type' => 'text',     'default_value' => 'Indywidualne podejście'],
            ['key' => 'field_ks_omnie_val3_txt', 'label' => 'Wartość 3 – tekst', 'name' => 'value_3_text',  'type' => 'textarea', 'rows' => 2,
                'default_value' => 'Każdy klient i każda sprawa jest inna. Nie stosuję szablonowych rozwiązań – słucham, analizuję i dobieram strategię dopasowaną do Twojej konkretnej sytuacji.'],

            // ── Tab: Wykształcenie ────────────────────────────────
            ['key' => 'field_ks_omnie_tab_edu', 'label' => 'Wykształcenie', 'type' => 'tab'],
            ['key' => 'field_ks_omnie_edu1_yr',  'label' => 'Poz. 1 – rok',   'name' => 'edu_1_year',  'type' => 'text', 'default_value' => '2020'],
            ['key' => 'field_ks_omnie_edu1_ttl', 'label' => 'Poz. 1 – tytuł', 'name' => 'edu_1_title', 'type' => 'text', 'default_value' => 'Egzamin adwokacki – wynik pozytywny'],
            ['key' => 'field_ks_omnie_edu1_dsc', 'label' => 'Poz. 1 – opis',  'name' => 'edu_1_desc',  'type' => 'text', 'default_value' => 'Okręgowa Rada Adwokacka w Warszawie · wpis nr WAW/ADW/9453'],
            ['key' => 'field_ks_omnie_edu2_yr',  'label' => 'Poz. 2 – rok',   'name' => 'edu_2_year',  'type' => 'text', 'default_value' => '2017 – 2019'],
            ['key' => 'field_ks_omnie_edu2_ttl', 'label' => 'Poz. 2 – tytuł', 'name' => 'edu_2_title', 'type' => 'text', 'default_value' => 'Aplikacja adwokacka'],
            ['key' => 'field_ks_omnie_edu2_dsc', 'label' => 'Poz. 2 – opis',  'name' => 'edu_2_desc',  'type' => 'text', 'default_value' => 'ORA w Warszawie · starosta grupy aplikacyjnej · Samorząd Aplikantów Adwokackich'],
            ['key' => 'field_ks_omnie_edu3_yr',  'label' => 'Poz. 3 – rok',   'name' => 'edu_3_year',  'type' => 'text', 'default_value' => '2011 – 2014'],
            ['key' => 'field_ks_omnie_edu3_ttl', 'label' => 'Poz. 3 – tytuł', 'name' => 'edu_3_title', 'type' => 'text', 'default_value' => 'Magister prawa'],
            ['key' => 'field_ks_omnie_edu3_dsc', 'label' => 'Poz. 3 – opis',  'name' => 'edu_3_desc',  'type' => 'text', 'default_value' => 'Uniwersytet SWPS, Warszawa'],
            ['key' => 'field_ks_omnie_edu4_yr',  'label' => 'Poz. 4 – rok',   'name' => 'edu_4_year',  'type' => 'text', 'default_value' => '2008 – 2010'],
            ['key' => 'field_ks_omnie_edu4_ttl', 'label' => 'Poz. 4 – tytuł', 'name' => 'edu_4_title', 'type' => 'text', 'default_value' => 'Magister socjologii'],
            ['key' => 'field_ks_omnie_edu4_dsc', 'label' => 'Poz. 4 – opis',  'name' => 'edu_4_desc',  'type' => 'text', 'default_value' => 'SGGW, Warszawa · spec. Komunikowanie społeczne i doradztwo'],

            // ── Tab: Doświadczenie ────────────────────────────────
            ['key' => 'field_ks_omnie_tab_exp', 'label' => 'Doświadczenie', 'type' => 'tab'],
            ['key' => 'field_ks_omnie_exp1_yr',  'label' => 'Poz. 1 – rok',   'name' => 'exp_1_year',  'type' => 'text', 'default_value' => '2020 – dziś'],
            ['key' => 'field_ks_omnie_exp1_ttl', 'label' => 'Poz. 1 – tytuł', 'name' => 'exp_1_title', 'type' => 'text', 'default_value' => 'Kancelaria Adwokacka Kamila Sadłowicz'],
            ['key' => 'field_ks_omnie_exp1_dsc', 'label' => 'Poz. 1 – opis',  'name' => 'exp_1_desc',  'type' => 'textarea', 'rows' => 2,
                'default_value' => 'Samodzielna praktyka · 150–200 spraw rocznie · prawo gospodarcze, cywilne, pracy, windykacja, restrukturyzacja · sądy wszystkich instancji'],
            ['key' => 'field_ks_omnie_exp2_yr',  'label' => 'Poz. 2 – rok',   'name' => 'exp_2_year',  'type' => 'text', 'default_value' => '2017 – 2020'],
            ['key' => 'field_ks_omnie_exp2_ttl', 'label' => 'Poz. 2 – tytuł', 'name' => 'exp_2_title', 'type' => 'text', 'default_value' => 'Aplikant adwokacki – Jerschina-Fus, Radtke-Cichocka Sp. J.'],
            ['key' => 'field_ks_omnie_exp2_dsc', 'label' => 'Poz. 2 – opis',  'name' => 'exp_2_desc',  'type' => 'textarea', 'rows' => 2,
                'default_value' => 'Warszawa · obsługa branży ochrony i automotive · pisma procesowe, zastępstwa sądowe, koncesje MSWiA i ABW'],
            ['key' => 'field_ks_omnie_exp3_yr',  'label' => 'Poz. 3 – rok',   'name' => 'exp_3_year',  'type' => 'text', 'default_value' => '2011 – 2013'],
            ['key' => 'field_ks_omnie_exp3_ttl', 'label' => 'Poz. 3 – tytuł', 'name' => 'exp_3_title', 'type' => 'text', 'default_value' => 'Asystent prawny – PROFESSIO Kancelaria Prawnicza / Saturn TFI S.A.'],
            ['key' => 'field_ks_omnie_exp3_dsc', 'label' => 'Poz. 3 – opis',  'name' => 'exp_3_desc',  'type' => 'textarea', 'rows' => 2,
                'default_value' => 'Warszawa · pisma procesowe w sprawach cywilnych i pracowniczych · zarządzanie sekretariatem kancelarii'],

            // ── Tab: Członkostwa ──────────────────────────────────
            ['key' => 'field_ks_omnie_tab_mem', 'label' => 'Członkostwa', 'type' => 'tab'],
            ['key' => 'field_ks_omnie_mem1_ttl', 'label' => 'Pole 1 – tytuł', 'name' => 'mem_1_title', 'type' => 'text', 'default_value' => 'Okręgowa Rada Adwokacka w Warszawie'],
            ['key' => 'field_ks_omnie_mem1_txt', 'label' => 'Pole 1 – tekst', 'name' => 'mem_1_text',  'type' => 'textarea', 'rows' => 2,
                'default_value' => 'Adwokat wpisana na listę adwokatów ORA w Warszawie od 2020 r.'],
            ['key' => 'field_ks_omnie_mem2_ttl', 'label' => 'Pole 2 – tytuł', 'name' => 'mem_2_title', 'type' => 'text', 'default_value' => 'Samorząd Aplikantów Adwokackich'],
            ['key' => 'field_ks_omnie_mem2_txt', 'label' => 'Pole 2 – tekst', 'name' => 'mem_2_text',  'type' => 'textarea', 'rows' => 2,
                'default_value' => 'Członek Samorządu Aplikantów Adwokackich ORA Warszawa przez cały okres aplikacji (2017–2019) · starosta grupy aplikacyjnej'],
            ['key' => 'field_ks_omnie_mem3_ttl', 'label' => 'Pole 3 – tytuł', 'name' => 'mem_3_title', 'type' => 'text', 'default_value' => 'Certyfikaty i szkolenia'],
            ['key' => 'field_ks_omnie_mem3_txt', 'label' => 'Pole 3 – tekst', 'name' => 'mem_3_text',  'type' => 'textarea', 'rows' => 2,
                'default_value' => 'Certyfikat AML – obowiązki instytucji obowiązanych (GIIF) · Ochrona Zarządu przed egzekucją (PTPiGR)'],
        ],
        'location'        => [[['param' => 'page_template', 'operator' => '==', 'value' => 'page-o-mnie.php']]],
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
