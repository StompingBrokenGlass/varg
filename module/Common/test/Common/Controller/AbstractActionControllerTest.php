<?php

namespace Common\Controller;

use Zend\ServiceManager\ServiceManager;
use Zend\Http\Request;
use Zend\Stdlib\Parameters;

abstract class AbstractActionControllerTest extends \PHPUnit_Framework_TestCase{
    protected $service_locator;
    protected $controller;
    protected $request;

    abstract function getControllerName();

    public function setUp(){
        $this->service_locator = new ServiceManager();
        $controller = $this->getControllerName();
        $this->request = new Request();
        $this->controller = new $controller($this->service_locator);
        $this->controller->setRequest($this->request);
    }

    public function mockPost($data){
        $data = new Parameters($data);
        $this->request->setPost($data);
        $this->request->setMethod(Request::METHOD_POST);
    }

    public function mockGet($data){
        $data = new Parameters($data);
        $this->request->setQuery($data);
        $this->request->setMethod(Request::METHOD_GET);
    }

    public function testIsAnActionController(){
        $this->assertInstanceOf('Common\Controller\AbstractActionController',$this->controller);
    }

    public function testIsAnAbstractActionController(){
        $this->assertInstanceOf('Zend\Mvc\Controller\AbstractActionController', $this->controller);
    }
}
