<?php

include_once 'vendor/autoload.php';

use Pmas\Component\Weather\Api\OpenWeatherClient;
use Symfony\Component\Stopwatch\Stopwatch;

$browser = new Buzz\Browser();
$stoper = new Stopwatch();
echo "Podaj nazwe miasta: ";
$handle = fopen ("php://stdin","r");
$line = fgets($handle);

$city = new OpenWeatherClient($line, $browser, $stoper);
