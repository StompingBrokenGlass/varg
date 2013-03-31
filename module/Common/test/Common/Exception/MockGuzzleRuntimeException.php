<?php

namespace Common\Exception;

use Guzzle\Http\Exception\HttpException;

class MockGuzzleRuntimeException extends \Exception implements HttpException  {
	
	private $response;

	public function setResponse($response){
		$this->response = $response;
	}

	public function getResponse(){
		return $this->response;
	}

} 