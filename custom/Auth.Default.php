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
		
		

		$adapter = new Zend_Auth_Adapter_DbTable(
			$zendDb, 
			$tableName, 
			$identityColumn, 
			$credentialColumn, 
			$credentialTreatment);
		
		$auth->authenticate($adapter);
	}
}