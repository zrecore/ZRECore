<?php
class Auth_Observer_Subject extends App_Subject_Abstract
{
	public function authenticate($username, $password, array $options = null)
	{
		$this->notify(__FUNCTION__, $username, $password, $options);
	}
}