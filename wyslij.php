<?php
/**
 * Obsługa formularza kontaktowego
 *
 * Jak działa honeypot:
 * W formularzu HTML jest ukryte pole "website". Boty skanują cały HTML
 * i wypełniają każde pole, bo nie wiedzą, które jest prawdziwe.
 * Człowiek nie widzi tego pola (jest schowane przez CSS poza ekran),
 * więc nigdy go nie wypełnia. Jeśli pole "website" jest niepuste → bot.
 * Zamiast odrzucać, zwracamy {"ok":true} — bot "myśli", że wysłał,
 * i nie próbuje ponownie.
 */

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit(json_encode(['ok' => false]));
}

// --- Honeypot ---
if (!empty($_POST['website'])) {
    exit(json_encode(['ok' => true]));
}

// --- Sanityzacja ---
function clean(string $val): string {
    return htmlspecialchars(strip_tags(trim($val)), ENT_QUOTES, 'UTF-8');
}

$name     = clean($_POST['name']     ?? '');
$email    = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$phone    = clean($_POST['phone']    ?? '');
$category = clean($_POST['category'] ?? '');
$urgency  = clean($_POST['urgency']  ?? '');
$message  = clean($_POST['message']  ?? '');

// --- Walidacja wymaganych pól ---
if (!$name || !$email || !$message || !$category) {
    http_response_code(400);
    exit(json_encode(['ok' => false, 'error' => 'Proszę wypełnić wszystkie wymagane pola.']));
}

// --- Etykiety kategorii i pilności ---
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
    'standard'    => 'Standardowa (24–48h)',
    'urgent'      => 'Pilna (kilka dni)',
    'very-urgent' => 'Bardzo pilna (termin)',
];
$categoryLabel = $categoryMap[$category] ?? $category;
$urgencyLabel  = $urgencyMap[$urgency]   ?? $urgency;

// --- Treść emaila ---
$to      = 'kamila.sadlowicz@kancelaria-sadlowicz.pl';
$subject = '=?UTF-8?B?' . base64_encode('Nowe zapytanie: ' . $name . ' — ' . $categoryLabel) . '?=';

$body  = "Nowe zapytanie z formularza kontaktowego\n";
$body .= "=========================================\n\n";
$body .= "Imię i nazwisko : {$name}\n";
$body .= "Email           : {$email}\n";
$body .= "Telefon         : " . ($phone ?: '(nie podano)') . "\n";
$body .= "Kategoria       : {$categoryLabel}\n";
$body .= "Pilność         : {$urgencyLabel}\n\n";
$body .= "Treść wiadomości\n";
$body .= "----------------\n";
$body .= wordwrap($message, 72, "\n", false) . "\n\n";
$body .= "----------------\n";
$body .= "Data: " . date('d.m.Y H:i') . "  |  IP: " . ($_SERVER['REMOTE_ADDR'] ?? '—') . "\n";

// --- Nagłówki —
// From:     adres kancelarii (serwer wysyła ze swojej domeny → SPF OK)
// Reply-To: email klienta    (kliknięcie "Odpowiedz" w kliencie pocztowym trafi do klienta)
$headers  = "From: \"Kancelaria Sadlowicz\" <kontakt@kancelaria-sadlowicz.pl>\r\n";
$headers .= "Reply-To: {$email}\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headers .= "Content-Transfer-Encoding: 8bit\r\n";

if (@mail($to, $subject, $body, $headers)) {
    exit(json_encode(['ok' => true]));
} else {
    http_response_code(500);
    exit(json_encode(['ok' => false, 'error' => 'Błąd wysyłki po stronie serwera. Napisz bezpośrednio na adres email.']));
}
