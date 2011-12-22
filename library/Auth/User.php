<?php

class Auth_User extends App_Observer_Abstract
{
	protected $name;
	
	private $_is_authenticated = false;
	
	public function __construct($name) {
		$this->name = $name;
	}
	
	public function __toString() {
		return (string) get_class($this) . ' ' . $this->name ;
	}
	
	public function update( SplSubject $s )
	{
		if ($s->getIsAuthenticated()) {
			$this->_is_authenticated = true;
		}
	}
}