<?php
class Auth_Observer_Subject extends App_Subject_Abstract
{
	private $_is_authenticated = false;
	
	public function setIsAuthenticated($bool)
	{
		$this->_is_authenticated = $bool;
		$this->notify();
	}
	
	public function getIsAuthenticated()
	{
		return $this->_is_authenticated;
	}
}