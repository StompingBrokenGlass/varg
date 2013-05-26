<?php
namespace Irc\Socket;

use \Phake;

class SocketTest extends \PHPUnit_Framework_TestCase {

    private $socket;

    public function setUp() {
        $this->socket = new Socket();
    }

    public function testConnectSetsSocket() {
        $server = 'hailsatan.com';
        $port = 666;

        $this->socket->connect($server, $port);

        $expected = fsockopen($server, $port);
        $actual  = $this->socket->socket;

        $this->assertEquals($expected, $actual);
    }

    public function fsockopen() {
        return;
    }
}
