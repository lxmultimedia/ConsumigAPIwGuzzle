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

$body = $response->getBody();
$string = json_decode($body->getContents());

$response = $client->request(
    'GET',
    $_ENV['BASE_URL_1'].'users/'.$string->userId
);

echo $response->getStatusCode().'<br>';
echo $response->getReasonPhrase().'<br>';

var_dump(json_decode($response->getBody()));
