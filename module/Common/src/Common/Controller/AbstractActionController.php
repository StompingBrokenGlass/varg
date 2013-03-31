<?php

namespace Common\Controller;

use Zend\Mvc\Controller\AbstractActionController as ActionController;

class AbstractActionController extends ActionController {

    protected $service_locator;

    public function __construct($service_locator){
        $this->service_locator = $service_locator;
    }

    public function setRequest($request){
        $this->request = $request;
    }

    public function get($service){
        return $this->service_locator->get($service);
    }
}
