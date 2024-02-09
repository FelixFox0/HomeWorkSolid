<?php

namespace App\Services;

/**
 * Class Request.
 */
class RequestService
{

	private $request_client;

public function set_client($client)
	{
		$this->request_client = $client;
		return $this;
	}
public function request($method,$url)
	{
	 return	$this->request_client->request($method,$url);
	}

}
