<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$client = new Client([
    'base_uri' => $_ENV['BASE_URL_1']
]);

$promise1 = $client->requestAsync(
    'GET',
    'posts/1'
);
$promise2 = $client->requestAsync(
    'GET',
    'posts/3'
);

$promises = array($promise1, $promise2);

$results =  GuzzleHttp\Promise\Utils::settle($promises)->wait();

foreach ($results as $result) {
    echo $result['value']->getBody();
    // $payload = json_decode($response->getBody()->getContents());
}
