<?php

namespace Common\Model;

use \Phake;

class UserModelTest extends \PHPUnit_Framework_TestCase {

    public function __construct() {
        $this->model = new User();
    }

    public function testisGrantedRoleReturnsTrueIfUserHasRole() {
        $role = 'consultant';

        $this->model->setRoles(array('consultant'));

        $this->assertTrue($this->model->isGranted($role));
    }
    public function testisGrantedRoleReturnsFalseIfUserDoesNotHaveRole() {
        $role = 'consultant';

        $this->model->setRoles(array('not consultant'));

        $this->assertFalse($this->model->isGranted($role));
    }
}
