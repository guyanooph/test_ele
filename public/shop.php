<?php

$a = [1,2,3];
$b = &$a;
$b[0] = 'a';
var_dump($a);
var_dump($b);

