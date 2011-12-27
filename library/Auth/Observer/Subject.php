<?php
class Auth_Observer_Subject extends App_Subject_Abstract
{
	public function authenticate()
	{
		$this->notify();
	}
}