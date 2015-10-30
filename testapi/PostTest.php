<?php
require __DIR__.'/../vendor/autoload.php';

$client = new GuzzleHttp\Client([
    'base_url' => 'http://social.app.cba',
    'defaults' => [
        'exceptions' => false,
       //'auth' => [$publishable_key, ''],
        'headers'  => ['content-type' => 'application/json', 'Accept' => 'application/json'],
        //'body' => json_encode($body),
    ]
]);

$response = $client->get('/app_dev.php/api/posts');
echo "\n";
echo $response;
echo "\n\n";
