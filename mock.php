<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\ClientException;

$mock = new MockHandler([
    new Response(200),
    new Response(200, ['X-Foo' => 'test']),
    new ClientException('error', new Request('GET', 'test'), new Response())
]);

$handler = HandlerStack::create($mock);
$client = new Client(['handler' => $handler]);

echo $client->request('GET', '/' )->getStatusCode().'<br>';
echo '<pre>';
print_r($client->request('GET', '/')->getHeader('X-Foo'));
echo '</pre>';
echo $client->request('GET', '/' )->getStatusCode().'<br>';
