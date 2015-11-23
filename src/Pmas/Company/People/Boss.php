<?php

namespace Pmas\Company\People;

class Boss
{

	private $worker;

	public function __construct($worker)
	{
		$this->worker = $worker;
	}

	public function work()
	{
		$this->worker->work();
	}
}
