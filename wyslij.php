<?php
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

// --- Walidacja ---
if (!$name || !$email || !$message || !$category) {
    http_response_code(400);
    exit(json_encode(['ok' => false, 'error' => 'Proszę wypełnić wszystkie wymagane pola.']));
}

// --- Etykiety ---
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
$body .= "Imie i nazwisko : {$name}\n";
$body .= "Email           : {$email}\n";
$body .= "Telefon         : " . ($phone ?: '(nie podano)') . "\n";
$body .= "Kategoria       : {$categoryLabel}\n";
$body .= "Pilnosc         : {$urgencyLabel}\n\n";
$body .= "Tresc wiadomosci\n";
$body .= "----------------\n";
$body .= wordwrap($message, 72, "\n", false) . "\n\n";
$body .= "----------------\n";
$body .= "Data: " . date('d.m.Y H:i') . "  |  IP: " . ($_SERVER['REMOTE_ADDR'] ?? '-') . "\n";

// --- Nagłówki ---
$headers  = "From: \"Kancelaria Sadlowicz\" <kontakt@kancelaria-sadlowicz.pl>\r\n";
$headers .= "Reply-To: {$email}\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headers .= "Content-Transfer-Encoding: 8bit\r\n";

// --- Wyslij i zapisz log diagnostyczny ---
$mailResult = mail($to, $subject, $body, $headers);

$logFile = __DIR__ . '/mail_log.txt';
$logEntry = date('Y-m-d H:i:s') . " | mail()=" . ($mailResult ? 'TRUE' : 'FALSE')
          . " | to={$to} | from={$name} <{$email}>"
          . " | error=" . error_get_last()['message'] ?? 'brak'
          . "\n";
file_put_contents($logFile, $logEntry, FILE_APPEND | LOCK_EX);

if ($mailResult) {
    exit(json_encode(['ok' => true]));
} else {
    http_response_code(500);
    exit(json_encode(['ok' => false, 'error' => 'Błąd wysyłki po stronie serwera. Napisz bezpośrednio na adres email.']));
}
