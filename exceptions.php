<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$client = new Client();

try {
    $response = $client->request(
        'GET',
        'https://httpbin.org/status/503'
    );
    var_dump($response);
} catch (\GuzzleHttp\Exception\ClientException $e) {
    echo $e->getCode().'<br>';
    echo $e->getMessage().'<br>';
} catch (\GuzzleHttp\Exception\ServerException $e) {
    echo $e->getCode() . '<br>';
    echo $e->getMessage() . '<br>';
}
