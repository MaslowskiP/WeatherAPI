<?php

include_once 'vendor/autoload.php';

use Pmas\Component\Weather\Api\OpenWeatherClient;
use Symfony\Component\Stopwatch\Stopwatch;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

$fs = new Filesystem();
$browser = new Buzz\Browser();
$stoper = new Stopwatch();
echo "Podaj nazwe miasta: ";
$handle = fopen ("php://stdin","r");
$line = fgets($handle);

$city = new OpenWeatherClient($line, $browser, $stoper, $fs);
