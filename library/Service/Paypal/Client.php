<?php

class Service_Paypal_Client extends Zend_Http_Client
{
	
	public function __construct($uri = null, $config = null)
	{
		parent::__construct($uri, $config);
		
		$this->setParameterGet( 'USER', urlencode(PAYPAL_API_USERNAME) );
		$this->setParameterGet( 'PWD', urlencode(PAYPAL_API_PASSWORD) );
		$this->setParameterGet( 'SIGNATURE', urlencode(PAYPAL_API_SIGNATURE) );
		$this->setParameterGet( 'VERSION', urlencode(PAYPAL_API_VERSION) );
	}
}