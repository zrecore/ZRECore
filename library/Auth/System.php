<?php
class Auth_System extends App_Subject_Abstract
{
	private $_is_authenticated = false;
	
	public function setIsAuthenticated()
	{
		$this->_is_authenticated = true;
		$this->notify();
	}
	
	public function getIsAuthenticated()
	{
		return $this->_is_authenticated;
	}
	
	public function setIsUnauthenticated()
	{
		$this->_is_authenticated = false;
		$this->notify();
	}
}