<?php

require "vendor/autoload.php";

use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;

$apiKey = "YOUR_GEMINI_API_KEY"; // or use getenv('GEMINI_API_KEY')
$client = new Client($apiKey);

// Input text
$data = json_decode(file_get_contents("php://input"));
$inputText = $data->text ?? '';

// Choose model
$modelName = 'gemini-2.0-flash';

// Generate response
$response = $client->generativeModel($modelName)->generateContent(
    new TextPart($inputText)
);

echo $response->text();