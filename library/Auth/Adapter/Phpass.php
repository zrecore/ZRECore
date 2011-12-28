<?php

class Auth_Adapter_Phpass implements Zend_Auth_Adapter_Interface
{
	private $_username;
	private $_password;
	
	public function __construct($username, $password)
	{
		$this->_username = $username;
		$this->_password = $password;
	}
	
	public function authenticate() {
		
		$code = Zend_Auth_Result::FAILURE;
		$identity = null;
		$messages = array();
		
		$username = $this->_username;
		$password = $this->_password;
		
		$model = new Application_Model_User;
		
		$exists = $model->listAll(array('handle' => $username), array('limit' => 1));
		
		if (!empty($exists) && $exists->count() > 0)
		{
			$record = $exists->current();
			$code = Zend_Auth_Result::FAILURE_IDENTITY_NOT_FOUND;
			
			$phpass = new PasswordHash(8, false);
			$is_valid = $phpass->CheckPassword($password, $record->password_hash);
			
			if ($is_valid) {
				$code = Zend_Auth_Result::SUCCESS;
				$identity = $record;
			}
			
		}
		
		$authResult = new Zend_Auth_Result($code, $identity, $messages);
		return $authResult;
	}
}