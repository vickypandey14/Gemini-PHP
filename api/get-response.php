<?php

// Allow CORS requests from any origin (or specify a domain instead of *)

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit;
}

require "../vendor/autoload.php";

use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;

$data = json_decode(file_get_contents("php://input"));

if (!$data || empty($data->text)) {
    echo json_encode(['error' => 'No prompt provided']);
    http_response_code(400);
    exit;
}

$text = $data->text;

$client = new Client("YOUR_GEMINI_API_KEY_HERE");

try {
    $response = $client->geminiPro()->generateContent(
        new TextPart($text)
    );
    
    echo json_encode(['response' => $response->text()]);
} catch (Exception $e) {
    echo json_encode(['error' => 'API call failed: ' . $e->getMessage()]);
    http_response_code(500);
}
