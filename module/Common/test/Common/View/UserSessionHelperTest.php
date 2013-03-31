<?php

namespace Common\View;

use Common\Model\User;
use Zend\Session\Container;

class UserSessionHelperTest extends \PHPUnit_Framework_TestCase {
	
	private $session;

	public function setUp(){
		$this->session = new Container('auth');
	}

	public function testSessionHelperIsAnAbstractHelper(){
		$helper = new UserSessionHelper();

		$this->assertInstanceOf('Zend\View\Helper\AbstractHelper', $helper);
	}

	public function testInvokeReturnsUserFromSession(){
		$user = new User();
		$this->session->user = $user;		
		$helper = new UserSessionHelper();

		$this->assertSame($user, $helper());
	}

	public function testInvokeReturnsEmptyUserIfSessionIsNull(){
		$this->session->user = null;		
		$helper = new UserSessionHelper();

		$user = new User();

		$this->assertEquals($user, $helper());
	}

}