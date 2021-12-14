<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$stream = Psr7\Utils::streamFor('this is a sample data');
echo $stream.'<br>';
echo $stream->getSize().'<br>';
echo $stream->isReadable().'<br>';
echo $stream->isWritable().'<br>';
echo $stream->isSeekable().'<br>';
$stream->write('Test').'<br>';
$stream->rewind();
echo $stream->read(5).'<br>';
echo $stream->getContents().'<br>';
echo $stream->eof().'<br>';