<?php

<<<<<<< HEAD
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
=======
$a = [1,2,3];
$b = &$a;
$b[0] = 'a';
var_dump($a);
var_dump($b);

>>>>>>> 50cf51014c83897565c6d0a919b79fe2a266521c
