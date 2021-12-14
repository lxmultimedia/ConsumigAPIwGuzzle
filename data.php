<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$client = new Client();
$response = $client->request(
    'POST',
    $_ENV['BASE_URL_1'] . 'posts',
    [
        'json' => [
            'title' =>  'guzzle-rest',
            'body'  =>  'guzzle makes rest easy',
            'userId'=>  '2'
        ]
    ]
);

echo $response->getStatusCode();
echo '<br>';
echo $response->getBody();