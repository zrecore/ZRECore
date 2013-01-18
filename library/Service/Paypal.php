<?php

class Service_Paypal
{
	/**
	 * Returns a PayPal HTTP Client.
	 * @return Service_Paypal_Client
	 */
	static function getClient()
	{
		$client = new Service_Paypal_Client(PAYPAL_EXPRESSCHECKOUT_URL);
		return $client;
	}
}