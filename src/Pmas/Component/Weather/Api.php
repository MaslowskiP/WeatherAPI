<?php

namespace Pmas\Component\Weather\Api;


class OpenWeatherClient
{

	private $line;
	private $browser;
	
	public function __construct($line, $browser) {
		
		$this->browser = $browser;
		$this->line = $line;
		$url = 'http://api.openweathermap.org/data/2.5/weather?q=' . $line . '&APPID=96cdeb166e66f9c035e9e7f8ce665ec8';
		$line[strlen($line)-1] = NULL;

		$response = $browser->get($url);
		$content = $response->getContent();
		$weatherObject = json_decode($content);
	
		echo 'Temperatura w ' . "$line" . ' wynosi ';
		$temp = $weatherObject->main->temp-273;
		echo "$temp";
		echo " stopni Celcjusza";
		echo "\n";




	}


}