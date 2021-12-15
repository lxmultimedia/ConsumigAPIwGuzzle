<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$client = new Client([
    'base_uri' => $_ENV['BASE_URL_1']
]);


$promise = $client->getAsync(
    'posts/1'
);

$promise->then(
    function (Response $response) {
        echo $response->getBody();
    },
    function (RequestException $re) {
        echo $re->getMessage();
    }
);
$response = $promise->wait();
