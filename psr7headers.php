<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$response = $client->request(
    'GET',
    'https://jsonplaceholder.typicode.com/posts/1'
);

if ($response->hasHeader('content-type')) {
    // echo implode(', ', $response->getHeader('content-type')) . "\r\n";
    $header = GuzzleHttp\Psr7\parse_header($response->getHeader('content-type'));
    foreach ($header as $value) {
        if (array_key_exists('charset', $value)) {
            echo $value['charset'];
        }
    }
}
