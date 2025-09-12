<?php

// Allow CORS requests from any origin (or specify a domain instead of *)
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require "../vendor/autoload.php";

use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;

$data = json_decode(file_get_contents("php://input"));

if (!$data || empty($data->text)) {
    http_response_code(400);
    echo json_encode(['error' => 'No prompt provided']);
    exit;
}

$text = trim($data->text);

// Initialize Gemini client
$apiKey = getenv('GEMINI_API_KEY') ?: "YOUR_GEMINI_API_KEY_HERE";
$client = new Client($apiKey);

// Choose latest model
$modelName = 'gemini-2.0-flash';

try {
    $response = $client
        ->generativeModel($modelName)
        ->generateContent(new TextPart($text));

    echo json_encode([
        'response' => $response->text()
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'API call failed',
        'message' => $e->getMessage()
    ]);
}
