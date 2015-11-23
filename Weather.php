<?php

include_once 'vendor/autoload.php';
use Pmas\Component\Weather\Api\OpenWeatherClient;


$browser = new Buzz\Browser();
echo "Podaj nazwe miasta: ";
$handle = fopen ("php://stdin","r");
$line = fgets($handle);

$city = new OpenWeatherClient($line, $browser);
