<?php

class Auth
{
	static function authenticate($username, $password, $options = null)
	{
		$observerSubjects = Zend_Registry::get('OBSERVER_SUBJECTS');
		$auth = $observerSubjects['Auth'];
		
		$result = $auth->authenticate($username, $password, $options);
		
		$observerSubjects['Auth'] = $auth;
		Zend_Registry::set('OBSERVER_SUBJECTS', $observerSubjects);
		
		return $result;
	}
}