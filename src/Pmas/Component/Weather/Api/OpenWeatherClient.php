<?php

namespace Pmas\Component\Weather\Api;


class OpenWeatherClient
{

	private $line;
	private $browser;
	private $stoper	

	public function __construct($line, $browser, $stoper) {
		
		$this->browser = $browser;
		$this->line = $line;
		$this->stoper = $stoper;
		$url = 'http://api.openweathermap.org/data/2.5/weather?q=' . $line . '&APPID=96cdeb166e66f9c035e9e7f8ce665ec8';
		$line[strlen($line)-1] = NULL;

		$response = $browser->get($url);
		$content = $response->getContent();
		$stoper->start('test');
		$weatherObject = json_decode($content);
		
		$czas = $stoper->stop('test');
		echo 'Temperatura w ' . "$line" . ' wynosi ';
		$temp = $weatherObject->main->temp-273;
		echo "$temp";
		echo " stopni Celcjusza";
		echo "\n";
		$czas->getDuration();
		echo "Czas pobierania: ";
		echo $czas;	




	}


}