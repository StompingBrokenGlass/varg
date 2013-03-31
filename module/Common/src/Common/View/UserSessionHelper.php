<?php

namespace Common\View;

use Zend\View\Helper\AbstractHelper;
use Zend\Session\Container;
use Common\Model\User;

class UserSessionHelper extends AbstractHelper {

	public function __invoke(){
		$container  = new Container('auth');
		$user = $container->user;
		if(!$user){
			$user = new User();
		}

		return $user;

	}	

}