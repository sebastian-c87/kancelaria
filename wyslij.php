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

if (!$name || !$email || !$message || !$category) {
    http_response_code(400);
    exit(json_encode(['ok' => false, 'error' => 'Proszę wypełnić wszystkie wymagane pola.']));
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

// --- Konfiguracja SMTP ---
$smtp_host = 'serwer2684968.hosting-home.pl';
$smtp_port = 465;
$smtp_user = 'kontakt@kancelaria-sadlowicz.pl';
$smtp_pass = 'Czerwiec123!';
$mail_to   = 'kamila.sadlowicz@kancelaria-sadlowicz.pl';

// --- Treść wiadomości ---
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
$body .= "Data: " . date('d.m.Y H:i') . "  |  IP: " . ($_SERVER['REMOTE_ADDR'] ?? '-') . "\n";

// --- Wysyłka przez SMTP ---
function smtp_send(string $host, int $port, string $user, string $pass,
                   string $from, string $to, string $reply_to,
                   string $subject, string $body): array
{
    $socket = @stream_socket_client(
        "ssl://{$host}:{$port}", $errno, $errstr, 15,
        STREAM_CLIENT_CONNECT
    );

    if (!$socket) {
        return ['ok' => false, 'error' => "Połączenie SMTP nieudane: {$errstr} ({$errno})"];
    }

    stream_set_timeout($socket, 10);

    $read = function() use ($socket): string {
        $out = '';
        while ($line = fgets($socket, 512)) {
            $out .= $line;
            if (isset($line[3]) && $line[3] === ' ') break;
        }
        return $out;
    };

    $cmd = function(string $c) use ($socket, $read): string {
        fputs($socket, $c . "\r\n");
        return $read();
    };

    // Powitanie
    $r = $read();
    if (substr($r, 0, 3) !== '220') {
        fclose($socket);
        return ['ok' => false, 'error' => "Brak powitania SMTP: {$r}"];
    }

    // EHLO
    $r = $cmd('EHLO ' . ($_SERVER['HTTP_HOST'] ?? 'kancelaria-sadlowicz.pl'));
    if (substr($r, 0, 3) !== '250') {
        fclose($socket);
        return ['ok' => false, 'error' => "EHLO nieudane: {$r}"];
    }

    // AUTH LOGIN
    $r = $cmd('AUTH LOGIN');
    if (substr($r, 0, 3) !== '334') {
        fclose($socket);
        return ['ok' => false, 'error' => "AUTH LOGIN nieudane: {$r}"];
    }

    $r = $cmd(base64_encode($user));
    if (substr($r, 0, 3) !== '334') {
        fclose($socket);
        return ['ok' => false, 'error' => "AUTH user nieudane: {$r}"];
    }

    $r = $cmd(base64_encode($pass));
    if (substr($r, 0, 3) !== '235') {
        fclose($socket);
        return ['ok' => false, 'error' => "AUTH haslo nieudane: {$r}"];
    }

    // MAIL FROM
    $r = $cmd("MAIL FROM:<{$from}>");
    if (substr($r, 0, 3) !== '250') {
        fclose($socket);
        return ['ok' => false, 'error' => "MAIL FROM nieudane: {$r}"];
    }

    // RCPT TO
    $r = $cmd("RCPT TO:<{$to}>");
    if (substr($r, 0, 3) !== '250') {
        fclose($socket);
        return ['ok' => false, 'error' => "RCPT TO nieudane: {$r}"];
    }

    // DATA
    $r = $cmd('DATA');
    if (substr($r, 0, 3) !== '354') {
        fclose($socket);
        return ['ok' => false, 'error' => "DATA nieudane: {$r}"];
    }

    // Nagłówki + treść
    $enc_subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
    $msg  = "Date: " . date('r') . "\r\n";
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
    if (substr($r, 0, 3) !== '250') {
        fclose($socket);
        return ['ok' => false, 'error' => "Wysylka nieudana: {$r}"];
    }

    $cmd('QUIT');
    fclose($socket);
    return ['ok' => true];
}

$result = smtp_send(
    $smtp_host, $smtp_port, $smtp_user, $smtp_pass,
    $smtp_user,   // From
    $mail_to,     // To
    $email,       // Reply-To (email klienta)
    $subject,
    $body
);

// Zapis logu do pliku (usuń po potwierdzeniu działania)
$log_line = date('Y-m-d H:i:s') . ' | ' . ($result['ok'] ? 'OK' : 'FAIL') . ' | ' . ($result['error'] ?? '') . ' | od: ' . $email . "\n";
file_put_contents(__DIR__ . '/mail_log.txt', $log_line, FILE_APPEND | LOCK_EX);

if ($result['ok']) {
    exit(json_encode(['ok' => true]));
} else {
    http_response_code(500);
    exit(json_encode(['ok' => false, 'error' => 'Błąd wysyłki. Napisz bezpośrednio: kamila.sadlowicz@kancelaria-sadlowicz.pl. Szczegóły: ' . $result['error']]));
}
