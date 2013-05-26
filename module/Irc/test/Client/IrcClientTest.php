<?php
namespace Irc\Client;

use \Phake,
    Zend\ServiceManager\ServiceManager;

class IrcClientTest extends \PHPUnit_Framework_TestCase {

    private $client;

    public function setUp() {
        $this->service_manager = new ServiceManager();
        $this->client = new IrcClient();
        $socket = Phake::mock('Irc\Socket\Socket');
        $this->service_manager->setService('IrcSocket',$socket);
    }

    public function testIrcClientGetsNewSocket() {

    }

}
