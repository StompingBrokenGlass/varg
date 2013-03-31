<?php

namespace Common\Model;

class User {

	protected $token;
	protected $client_id;
	protected $user_id;
	protected $roles;
	protected $reset_required;

	public function __construct(){
		$this->setRoles(array());
		$this->setResetRequired(false);
	}

	public function getToken(){
		return $this->token;
	}

	public function setToken($token){
		$this->token = $token;
	}

	public function getUserId(){
		return $this->user_id;
	}

	public function setUserId($user_id){
		$this->user_id = $user_id;
	}

	public function getRoles(){
		return $this->roles;
	}

	public function setRoles($roles){
		$this->roles = $roles;
	}

	public function isGranted($role) {
		return in_array($role, $this->getRoles());
	}

	public function getResetRequired() {
		return $this->reset_required;
	}

	public function setResetRequired($reset_required) {
		$this->reset_required = $reset_required;
	}
}
