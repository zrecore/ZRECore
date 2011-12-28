<?php

class Custom_Auth_Default extends App_Observer_Abstract
{
	public function authenticate($username, $password, $options = null)
	{
		$auth = Zend_Auth::getInstance();

		if ( !$auth->hasIdentity() )
		{
			$auth->setStorage( new Zend_Auth_Storage_Session );
		}
		
		$adapter = new Auth_Adapter_Phpass($username, $password);
		
		$result = $auth->authenticate($adapter);
	}
}