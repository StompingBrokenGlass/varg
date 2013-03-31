<?php
namespace Common;

use Guzzle\Http\Client;

class Module {
    public function getConfig(){
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig(){
        return array(
            'factories' => array(
                'RestfulService' => function($service_locator) {
                    $config = $service_locator->get('config');
                    $client = new Client($config['api-server'], array('ssl.certificate_authority'=>false));
                    $service = new Rest\RestCaller($client);
                    return $service;
                },
                'LoginService' => function($service_locator){
                    $service = new Service\LoginService($service_locator->get('RestfulService'));
                    return $service;
                },
                'AccountService' => function($service_locator){
                    $service = new Service\AccountService($service_locator);
                    return $service;
                }
            )
        );
    }

    public function getViewHelperConfig() {
        return array(
            'factories' => array(
                'getUserFromSession' => function($sm) {
                    return new View\UserSessionHelper();
                },
            )
        );
    }
}

