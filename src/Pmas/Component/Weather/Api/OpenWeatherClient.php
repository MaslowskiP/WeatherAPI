<?php

namespace Pmas\Component\Weather\Api;


class OpenWeatherClient
{

	private $line;
	private $browser;
	private $stoper;
	private $fs;	

	public function __construct($line, $browser, $stoper, $fs) {
		
		$this->browser = $browser;
		$this->line = $line;
		$this->stoper = $stoper;
		$this->fs = $fs;
		$stoper->start('test');
		$url = 'http://api.openweathermap.org/data/2.5/weather?q=' . $line . '&APPID=96cdeb166e66f9c035e9e7f8ce665ec8';
		$line = trim($line);
		$sprawdzaniePliku = '/home/studenci/r12/s181008/public_html/web/pp16/' . $line . '.tmp';
		
    		if (file_exists($sprawdzaniePliku) && filemtime($sprawdzaniePliku) > time()-600) {
			$czas = $stoper->stop('test');
			$file=fopen($sprawdzaniePliku, "r");  
			flock($file, 1);  
			$src=fgets($file, 30);
			fclose($file); 
			echo 'Temperatura w ' . "$line" . ' wynosi ' . $src . " stopni Celcjusza.\n";
 			echo 'Dane z: '. date ("d m Y H:i:s.", filemtime($sprawdzaniePliku));
		} else {
			$response = $browser->get($url);
			$content = $response->getContent();
		
			$weatherObject = json_decode($content);
		
			$czas = $stoper->stop('test');
			echo 'Temperatura w ' . "$line" . ' wynosi ';
			$temp = $weatherObject->main->temp-273.15;
			$temp = round($temp);
			echo "$temp";
			echo " stopni Celcjusza\n";
			echo "Czas pobierania: ";
			$pomiar = var_export(round($czas->getDuration()/1000));
			echo $pomiar . " sekund.\n";
			$fs->dumpFile($sprawdzaniePliku , $temp);	
		}
	}
}