<?php

class Service_Paypal_Client extends Zend_Http_Client {

	/**
	 * Construct this Zend_Http_Client class as a PayPal NVP Client.
	 * @param string $uri
	 * @param array $config 
	 */
	public function __construct($uri = null, $config = null) {
		parent::__construct($uri, $config);

		$this->setParameterGet('USER', urlencode(PAYPAL_API_USERNAME));
		$this->setParameterGet('PWD', urlencode(PAYPAL_API_PASSWORD));
		$this->setParameterGet('SIGNATURE', urlencode(PAYPAL_API_SIGNATURE));
		$this->setParameterGet('VERSION', urlencode(PAYPAL_API_VERSION));
	}

	/**
	 * Calls the 'DoDirectPayment' API call. Note - Keep track of the
	 * transaction ID on success! You'll need it to get transaction details
	 * at a later date.
	 *
	 * @param float $amount
	 * @param string $credit_card_type
	 * @param string $credit_card_number
	 * @param string $expiration_month
	 * @param string $expiration_year
	 * @param string $cvv2
	 * @param string $first_name
	 * @param string $last_name
	 * @param string $address1
	 * @param string $address2
	 * @param string $city
	 * @param string $state
	 * @param string $zip
	 * @param string $country
	 * @param string $currency_code
	 * @param string $ip_address
	 * @param string $payment_action Can be 'Authorization' (default) or 'Sale'
	 *
	 * @return Zend_Http_Response
	 * @throws Zend_Http_Client_Exception
	 */
	function doDirectPayment($amount, $credit_card_type, $credit_card_number, $expiration_month, $expiration_year, $cvv2, $first_name, $last_name, $address1, $address2, $city, $state, $zip, $country, $currency_code, $ip_address, $payment_action = 'Authorization') {
		$this->setParameterGet('METHOD', 'DoDirectPayment');

		$expiration_date = str_pad($expiration_month, 2, STR_PAD_LEFT) .
			$expiration_year;

		$this->setParameterGet('PAYMENTACTION', urlencode($payment_action)); // Can be 'Authorization', or 'Sale'
		$this->setParameterGet('AMT', urlencode($amount));
		$this->setParameterGet('CREDITCARDTYPE', urlencode($credit_card_type));
		$this->setParameterGet('ACCT', urlencode($credit_card_number));
		$this->setParameterGet('EXPDATE', urlencode($expiration_date));
		$this->setParameterGet('CVV2', urlencode($cvv2));
		$this->setParameterGet('FIRSTNAME', urlencode($first_name));
		$this->setParameterGet('LASTNAME', urlencode($last_name));
		$this->setParameterGet('STREET', urlencode($address1));

		if (!empty($address2)) {
			$this->setParameterGet('STREET2', urlencode($address2));
		}

		$this->setParameterGet('CITY', urlencode($city));
		$this->setParameterGet('STATE', urlencode($state));
		$this->setParameterGet('ZIP', urlencode($zip));
		$this->setParameterGet('COUNTRYCODE', urlencode($country));
		$this->setParameterGet('CURRENCYCODE', urlencode($currency_code));
		$this->setParameterGet('IPADDRESS', urlencode($ip_address));

		return $this->request(Zend_Http_Client::GET);
	}

	/**
	 *
	 * Calls the 'ECDoExpressCheckout' API call. Requires a token that can
	 * be obtained using the 'SetExpressCheckout' API call. The payer_id is
	 * obtained from the 'SetExpressCheckout' or 'GetExpressCheckoutDetails' API call.
	 *
	 * @param string $token
	 * @param string $payer_id
	 * @param float  $payment_amount
	 * @param string $currency_code
	 * @param string $payment_action Can be 'Authorization', 'Sale', or 'Order'
	 *
	 * @return Zend_Http_Response
	 * @throws Zend_Http_Client_Exception
	 */
	function ecDoExpressCheckout($token, $payer_id, $payment_amount, $currency_code, $payment_action = 'Sale') {
		$this->setParameterGet('METHOD', 'DoExpressCheckoutPayment');
		$this->setParameterGet('AMT', $payment_amount);
		$this->setParameterGet('TOKEN', $token);
		$this->setParameterGet('PAYERID', $payer_id);
		$this->setParameterGet('PAYMENTACTION', $payment_action); // Can be 'Authorization', 'Sale', or 'Order'

		return $this->request(Zend_Http_Client::GET);
	}

	/**
	 * Request an authorization token.
	 *
	 * @param float $paymentAmount
	 * @param string $returnURL
	 * @param string $cancelURL
	 * @param string $currencyID
	 * @param string $payment_action Can be 'Authorization', 'Sale', or 'Order'. Default is 'Authorization'
	 * @return Zend_Http_Response
	 */
	function ecSetExpressCheckout($paymentAmount, $returnURL, $cancelURL, $currencyID, $payment_action = 'Authorization') {
		$this->setParameterGet('METHOD', 'SetExpressCheckout');

		// The paypal PDF says to use this and not AMT, but in practice, 
		// that doesnt work yet as of the time of this writting...
		$this->setParameterGet('PAYMENTREQUEST_0_AMT', $paymentAmount);
		// ...So we will do this for now.
		//$this->setParameterGet('AMT', $paymentAmount);

		$this->setParameterGet('RETURNURL', $returnURL);
		$this->setParameterGet('CANCELURL', $cancelURL);
		$this->setParameterGet('PAYMENTREQUEST_0_PAYMENTACTION', $payment_action); // Can be 'Authorization', 'Sale', or 'Order'

		return $this->request(Zend_Http_Client::GET);
	}

	/**
	 * Parse a Name-Value Pair response into an object.
	 * @param string $response
	 * @return object Returns an object representation of the response.
	 */
	public static function parse($response) {

		$responseArray = explode("&amp;", $response);

		$result = array();

		if (count($responseArray) > 0) {
			foreach ($responseArray as $i => $value) {

				$keyValuePair = explode("=", $value);

				if (sizeof($keyValuePair) > 1) {
					$result[$keyValuePair[0]] = urldecode($keyValuePair[1]);
				}
			}
		}

		if (empty($result)) {
			$result = null;
		} else {
			$result = (object) $result;
		}

		return $result;
	}

}