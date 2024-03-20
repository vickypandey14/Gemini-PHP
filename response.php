<?php

require "vendor/autoload.php";

use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;

$data = json_decode(file_get_contents("php://input"));

$text = $data->text;

// Enter Your Gemini API Key Here....
// Replace YOUR_GEMINI_API_KEY_HERE with your API key

$client = new Client("YOUR_GEMINI_API_KEY_HERE");

$response = $client->geminiPro()->generateContent(
    new TextPart($text),
);

echo $response->text();