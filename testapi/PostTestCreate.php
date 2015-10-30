<?php
require __DIR__.'/../vendor/autoload.php';

$client = new GuzzleHttp\Client([
    'base_url' => 'http://social.app.dev',
    'defaults' => [
        'exceptions' => false,
       //'auth' => [$publishable_key, ''],
        'headers'  => ['content-type' => 'application/json', 'Accept' => 'application/json'],
        //'body' => json_encode($body),
    ]
]);

$post = array( 'post' => array(
    'title' => 'Foo and Bar',
    'content' => 'the quick fox jumped over lazy dog'
    )
);

$response = $client->post('/app_dev.php/api/posts', array(
                'body' => json_encode($post)
            ));
echo "\n";
echo $response;
echo "\n\n";
