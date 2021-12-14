<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\ClientException;

$body = json_encode([
    'id = 10',
    'name' => 'sample'
]);


$mock = new MockHandler([
    new Response(200, [], $body),
]);

$handler = HandlerStack::create($mock);
$client = new Client(['handler' => $handler]);

$response = $client->request('GET', '/');
echo $response->getStatusCode().'<br>';
echo var_dump($response->getHeaders()).'<br>';
echo $response->getBody().'<br>';
