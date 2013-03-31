<?php

namespace Common\Rest;

use \Phake;
use Guzzle\Common\Collection;

class RestCallerTest extends \PHPUnit_Framework_TestCase {

	private $client;
	private $request;
	private $consumer;
	private $header;

	public function setUp(){
		$this->client = Phake::mock('Guzzle\Http\Client');
		$this->request = Phake::mock('Guzzle\Http\Message\Request');
		Phake::when($this->client)->get($this->anything(), $this->anything())->thenReturn($this->request);
		Phake::when($this->client)->post($this->anything(), $this->anything(), $this->anything())->thenReturn($this->request);
		$this->consumer = new RestCaller($this->client);
		$this->header = new Collection();
	}
	
	public function testGetCallsTheClientGet(){
		$uri = '/Foo';

		$this->consumer->get($uri);

		Phake::verify($this->client)->get($uri, null);
	}

	public function testGetReturnsUsAResponse(){
		$uri = '/Foo';
		$expect = 'I sents you dataz';
		Phake::when($this->client)->get($uri, $this->anything())->thenReturn($this->request);
		Phake::when($this->request)->send()->thenReturn($expect);

		$actual = $this->consumer->get($uri);

		$this->assertEqualS($expect, $actual);
	}

	public function testGetShouldUseDefaultHeaders(){
		$uri = '/Foo';
		Phake::when($this->client)->getDefaultHeaders()->thenReturn($this->header);
		Phake::when($this->client)->get($this->anything(), Phake::capture($actual_headers))->thenReturn($this->request);

		$this->consumer->get($uri);

		$this->assertSame($this->header, $actual_headers);
	}

	public function testPostCallsTheClientPost(){
		$uri = '/Foo';

		$this->consumer->post($uri, array());

		Phake::verify($this->client)->post($uri, null, array());
	}

	public function testPostCallsTheClientPostWithContent(){
		$uri = '/Foo';
		$content = array('Foo'=>'bar');

		$this->consumer->post($uri, $content);

		Phake::verify($this->client)->post($uri, null, $content);
	}

	public function testPostCallsTheClientPostShouldUseDefualtHeaders(){
		$uri = '/Foo';
		Phake::when($this->client)->getDefaultHeaders()->thenReturn($this->header);
		Phake::when($this->client)->post($uri, Phake::capture($actual_headers), array())->thenReturn($this->request);

		$this->consumer->post($uri);

		$this->assertSame($this->header, $actual_headers);
	}

	public function testPostDefaultsBodyToEmptyArray(){
		$uri = '/Foo';

		$this->consumer->post($uri);

		Phake::verify($this->client)->post($uri, null, array());
	}

	public function testGetThrowsTheException(){
		$this->consumer = Phake::partialMock('Common\Rest\RestCaller', $this->client);

		$uri = '/Foo';
		$expect = 'I sents you dataz';
		$exception = new \Exception();
		Phake::when($this->request)->send()->thenThrow($exception);
		try{
			$actual = $this->consumer->get($uri);
		}catch(\Exception $e){
			$this->assertSame($exception, $e);
		}
	}

	public function testPostPassesTheResponseThroughTheValidator(){
		$this->consumer = Phake::partialMock('Common\Rest\RestCaller', $this->client);

		$uri = '/Foo';
		$expect = 'I sents you dataz';
		Phake::when($this->client)->post($uri, $this->anything(), $this->anything())->thenReturn($this->request);
		$exception = new \Exception();
		Phake::when($this->request)->send()->thenThrow($exception);
		try{
			$actual = $this->consumer->post($uri);
		}catch(\Exception $e){
			$this->assertSame($exception, $e);	
		}

	}

}
