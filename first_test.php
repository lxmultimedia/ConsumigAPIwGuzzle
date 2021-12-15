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

var_dump($response);
echo '<br/>';
echo $response->getStatusCode();
echo '<br/>';
echo $response->getBody();
