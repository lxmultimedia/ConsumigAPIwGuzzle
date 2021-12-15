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

echo $response->getStatusCode();
echo '<br/>';
echo $response->getReasonPhrase();
echo '<br/>';
$response = $response->withStatus(418);
echo $response->getStatusCode();
echo '<br/>';
echo $response->getReasonPhrase();
echo '<br/>';
$response = $response->withStatus(419, 'Coffee is better than tea');
echo $response->getStatusCode();
echo '<br/>';
echo $response->getReasonPhrase();
echo '<br/>';
