<?php 

class DrexCartUserManager {
	
	//private $userId;
	private $userdata;
	
	public function loginById($user_id) {
		$this->DrexCartUser = ClassRegistry::init('DrexCart.DrexCartUser');
		$this->DrexCartUser->create();
		
		// find the user
		$user = $this->DrexCartUser->getUserById((int)$user_id);
		
		if ($user) {
			$this->userdata = $user;
			return true;
		} else {
			return false;
		}
	}
	
	public function loginByEmail($email=null, $password=null) {
		
	}
	
	
	public function isLoggedIn() {
		return ($this->userdata) ? true : false;
		print_r($this->userdata);
	}
	
	public function getUserId() {
		return $this->userdata['DrexCartUser']['id'];
	}
	

	public function getUserEmail() {
		return $this->userdata['DrexCartUser']['email'];
	}
	
	
}

?>