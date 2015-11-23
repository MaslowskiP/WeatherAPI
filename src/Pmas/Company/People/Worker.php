<?php

namespace Pmas\Company\People;

class Worker
{
	private $name;

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function work()
	{
		echo ('I am '. $this->name);
		echo ('I am working very hard');
	}
}
