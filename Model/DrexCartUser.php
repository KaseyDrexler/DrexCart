<?php

class DrexCartUser extends DrexCartAppModel {
	public $name = 'DrexCartUser';
	
	public $validate = array(
			'email' => array(
					'email'=>array(
						'rule' => 'email',
						'message' => 'You must enter an email address'),
					'isUnique'=> array('rule'=>'isUnique', 'message'=>'Email already exists'),
			),
			'password' => array(
					'notEmpty' => array(
						'rule'    => 'notEmpty',
						'message' => 'You must enter a password'),
					'identicalFieldValues' => array('rule' => array('identicalFieldValues','vpassword'), 'message' => 'Both passwords must match'),
					'between' => array('rule' => array('between', 6, 16), 'message' => 'Between 6 to 16 characters')
			),
			'vpassword' => array('identicalFieldValues' => array('rule' => array('identicalFieldValues','password'), 'message' => 'Both passwords must match'))
				
	);

	
	// validation rule
	function identicalFieldValues( $field=array(), $compare_field=null )
	{
		foreach( $field as $key => $value ){
			$v1 = $value;
			$v2 = $this->data[$this->name][ $compare_field ];
			if($v1 !== $v2) {
				return FALSE;
			} else {
				continue;
			}
		}
		return TRUE;
	}
	
	public function getUserById($user_id=null) {
		return $this->find('first', array('conditions'=>array('id'=>(int)$user_id)));
	}
	
	public function getUserByEmail($email=null) {
		return $this->find('first', array('conditions'=>array('email'=>$email)));
	}
	
	public function getUsersCreatedCount() {
		return $this->find('all', array('fields'=>array('count(*) as thecount', 'date(DrexCartUser.created_date) as thedate'),
										'conditions'=>array('DrexCartUser.created_date>\''.date('Y-m-d 00:00:00', time()-86400*7).'\'')));
	}
}