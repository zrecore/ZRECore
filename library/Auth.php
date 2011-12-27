<?php

class Auth
{
	static function authenticate($username, $password, $options = null)
	{
		$observerSubjects = Zend_Registry::get('OBSERVER_SUBJECTS');
		$cart = $observerSubjects['Auth'];
		
		$result = $cart->addToCart($items);
		
		$observerSubjects['Auth'] = $cart;
		Zend_Registry::set('OBSERVER_SUBJECTS', $observerSubjects);
		
		return $result;
	}
	
	static function isAuthenticated() {
		$observerSubjects = Zend_Registry::get('OBSERVER_SUBJECTS');
		$cart = $observerSubjects['Auth'];
		
		$result = $cart->isAuthenticated();
		
		$observerSubjects['Auth'] = $cart;
		Zend_Registry::set('OBSERVER_SUBJECTS', $observerSubjects);
		
		return $result;
	}
}