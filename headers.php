<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$client = new Client();
$response = $client->request(
    'GET',
    $_ENV['BASE_URL_1'].'posts/1'
);

$headers = $response->getHeaders();

foreach ($headers as $name => $value) {
    $value = implode(", ", $value);
    echo "{$name} : {$value}<br>";
}

$type = $response->getHeaders('Content-Type');

if(in_array('application/json; charset=utf-8', $type['Content-Type'])) {
    $body = json_decode($response->getBody());
} else {
    $body = $response->getBody();
}

echo '<pre>';
print_r($body);
echo '</pre>';