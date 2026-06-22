<?php
/**
 * Proxy do OpenAI API dla chatbota kancelarii.
 * Plik umieszcza sie w glownym katalogu WordPressa (obok wp-config.php).
 * PRZED WGRANIEM: zastap TUTAJ_WSTAW_KLUCZ_API swoim kluczem z platform.openai.com
 */

header('Content-Type: application/json; charset=utf-8');

// === KLUCZ API - zmien na swoj wlasny ===
define('OPENAI_API_KEY', 'TUTAJ_WSTAW_KLUCZ_API');

// === MODEL - sprawdz w panelu OpenAI czy masz dostep ===
define('OPENAI_MODEL', 'gpt-5-nano');

// CORS - tylko z domeny kancelarii
header('Access-Control-Allow-Origin: https://kancelaria-sadlowicz.pl');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { exit; }

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Niedozwolona metoda.']);
    exit;
}

// Limit wiadomosci per sesja
session_start();
if (!isset($_SESSION['chat_count'])) {
    $_SESSION['chat_count'] = 0;
}
if ($_SESSION['chat_count'] >= 30) {
    http_response_code(429);
    echo json_encode(['error' => 'Przekroczono limit 30 wiadomosci w tej sesji. Odswierz strone lub zadzwon: +48 790 013 287']);
    exit;
}
$_SESSION['chat_count']++;

// Wczytaj dane wejsciowe
$input = json_decode(file_get_contents('php://input'), true);
$messages = $input['messages'] ?? [];

if (empty($messages) || !is_array($messages)) {
    http_response_code(400);
    echo json_encode(['error' => 'Brak wiadomosci.']);
    exit;
}

// Ostatnie 10 wiadomosci (ogranicz dlugosc kontekstu)
$messages = array_slice($messages, -10);

// Sanityzacja
foreach ($messages as &$msg) {
    $msg['role']    = in_array($msg['role'], ['user', 'assistant']) ? $msg['role'] : 'user';
    $msg['content'] = substr(strip_tags((string)($msg['content'] ?? '')), 0, 500);
}
unset($msg);

// System prompt - wiedza o kancelarii
$systemPrompt = 'Jestes AI asystentem kancelarii adwokackiej Kamili Sadlowicz w Warszawie. Odpowiadasz wylacznie po polsku, profesjonalnie i zwiezle (max 3-4 zdania na odpowiedz).

ZASADY DZIALANIA:
- NIE udzielasz konkretnych porad prawnych - zawsze polecasz konsultacje z adwokatem
- Podajesz tylko ogolne informacje o kancelarii i orientacyjny cennik
- Jesli pytanie wykracza poza Twoja wiedze - przekieruj do formularza lub telefonu
- Nie odpowiadasz na tematy niezwiazane z prawem lub kancelaria
- Pod koniec odpowiedzi mozesz zaproponowac bezplatna konsultacje

KANCELARIA:
Kancelaria Adwokacka Kamila Sadlowicz
Adres: ul. Arbuzowa 12, 02-747 Warszawa (Mokotow)
Tel: +48 790 013 287
Email: kamila.sadlowicz@kancelaria-sadlowicz.pl
Godziny pracy: pn-pt 9:00-17:00
Pierwsza konsultacja telefoniczna do 15 minut: BEZPLATNA

SPECJALIZACJE:
- Prawo rodzinne: rozwod, alimenty, kontakty z dziecmi, podzial majatku
- Prawo cywilne: umowy, odszkodowania, spory majatkowe, zniesienie wspolwlasnosci
- Prawo gospodarcze: obsluga firm, spolki, umowy handlowe, spory gospodarcze
- Windykacja naleznosci: odzyskiwanie dlugow, nakaz zaplaty, egzekucja komornicza
- Prawo karne: obrona w sprawach karnych i karnogospodarczych
- Prawo spadkowe: testamenty, podzial spadku, zachowek, stwierdzenie nabycia spadku

CENNIK ORIENTACYJNY (netto):
- Konsultacja (1h): od 300 zl
- Pismo procesowe / umowa: od 500 zl
- Reprezentacja w sadzie (I instancja): od 2000 zl
- Rozwod za porozumieniem stron: od 2500 zl
- Rozwod z orzekaniem o winie: od 3500 zl
- Windykacja - nakaz zaplaty (e-sad): od 500 zl
- Abonament prawny START (firmy): 500 zl/mies
- Abonament prawny BIZNES: 1200 zl/mies

CZAS TRWANIA SPRAW (orientacyjnie):
- Nakaz zaplaty (e-sad): 2-4 miesiace
- Sprawy cywilne: 12-18 miesiecy
- Rozwod bez orzekania o winie: 6-10 miesiecy
- Rozwod z orzekaniem o winie: 18-30 miesiecy';

// Przygotuj zapytanie do OpenAI
$apiPayload = [
    'model'      => OPENAI_MODEL,
    'messages'   => array_merge(
        [['role' => 'system', 'content' => $systemPrompt]],
        $messages
    ),
    'max_tokens'  => 300,
    'temperature' => 0.6,
];

// Wywolaj OpenAI API
$ch = curl_init('https://api.openai.com/v1/chat/completions');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => json_encode($apiPayload),
    CURLOPT_HTTPHEADER     => [
        'Content-Type: application/json',
        'Authorization: Bearer ' . OPENAI_API_KEY,
    ],
    CURLOPT_TIMEOUT        => 20,
    CURLOPT_SSL_VERIFYPEER => true,
]);

$response  = curl_exec($ch);
$httpCode  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);
curl_close($ch);

if ($curlError || $httpCode !== 200) {
    http_response_code(500);
    echo json_encode(['error' => 'Blad polaczenia z AI. Zadzwon bezposrednio: +48 790 013 287']);
    exit;
}

$data  = json_decode($response, true);
$reply = trim($data['choices'][0]['message']['content'] ?? '');

if (empty($reply)) {
    http_response_code(500);
    echo json_encode(['error' => 'Brak odpowiedzi od AI.']);
    exit;
}

echo json_encode(['reply' => $reply]);
