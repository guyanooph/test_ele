<?php

require __DIR__."/../vendor/autoload.php";

$options = array(
        'cluster' => 'us2',
        'encrypted' => true
);

$pusher = new Pusher\Pusher(
    '48d1b067026742344755',
    'b03bd95a6122ccdad81f',
    '368530',
    $options
);

$data['message'] = 'hello world';
$res = $pusher->trigger('my-channel', 'my-event', $data);

var_dump($res);
