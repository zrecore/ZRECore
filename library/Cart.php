<?php

class Cart
{
	public static function addToCart(array $items)
	{
		$observerSubjects = Zend_Registry::get('OBSERVER_SUBJECTS');
		$cart = $observerSubjects['Cart'];
		
		$result = $cart->addToCart($items);
		
		$observerSubjects['Cart'] = $cart;
		Zend_Registry::set('OBSERVER_SUBJECTS', $observerSubjects);
		
		return $result;
	}
}