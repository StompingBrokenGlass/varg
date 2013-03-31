<?php

namespace Common\Rest;

class RestCaller {

	protected $client;

	public function createHeader(){
		return $this->client->getDefaultHeaders();
	}

	public function __construct($client){
		$this->client = $client;
	}

	public function get($uri){
		$request =  $this->client->get($uri, $this->createHeader());
		try{
			$response = $request->send();
		}catch(\Exception $exception){
			$this->handleError($exception);
		}
		return $response;
	}

	public function post($uri, $content = array()){
		$request = $this->client->post($uri, $this->createHeader(), $content);
		try{
			$response = $request->send();
		}catch(\Exception $exception){
			$this->handleError($exception);
		}
		return $response;

	}

	public function handleError($exception){
		throw $exception;
	}
	
}