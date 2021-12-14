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

if($response->hasHeader('content-type')) {
    echo implode(', ', $response->getHeader('content-type'));
    echo '<br/>';
    $header =  GuzzleHttp\Psr7\Header::parse($response->getHeader('content-type'));

    foreach ($header as $value) {
        if(array_key_exists('charset', $value)){
            echo $value['charset'];
        }
    }
}

