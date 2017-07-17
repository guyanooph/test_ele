<?php
require_once('./geohash.class.php');
$pdo = new PDO("mysql:host=127.0.0.1;dbname=test_ele;charset=utf8","root","ab40f727");
$geohash = new Geohash();

$sql_1 = "insert into merchant values";


for($i=100000;$i<500000;$i++){
    $sql_2 = "(null, ";
    $longitude = 115.5 + rand(0,999999)/1000000;
    $latitude = 39.5 + rand(0,999999)/1000000;
    //echo $longitude.",".$latitude."\n";
    
    $position = $latitude.",".$longitude;
    $geo = $geohash->encode($latitude, $longitude); 
    //echo $position."\n";
    
    $sql_2 .= ($i+1).", ";
    $sql_2 .= "'汉堡".$geo."', ";
    $sql_2 .= "'123.jpg', ";
    $sql_2 .= "4.5, ";
    $sql_2 .= "'回龙观', ";

    $sql_2 .= "'{$geo}', ";
    $sql_2 .= "'{$position}', ";
    $sql_2 .= "'13773136524', ";
    $sql_2 .= "'冒牌汉堡', ";
    $sql_2 .= "'45分钟', ";
    $sql_2 .= "445, ";
    $sql_2 .= "'7:00-21:00', ";
    $sql_2 .= "'20', ";
    $sql_2 .= "'自送', ";
    $sql_2 .= "1, ";
    $sql_2 .= "'10', ";
    $sql_2 .= "'1000' );";
    $sql = $sql_1.$sql_2;
    echo $sql."\n";
    $m = $pdo->exec($sql);
    //var_dump($m);
};
