<?php
namespace Commerce;

/**
 * @Entity
 * @Table(name="merchantGateway")
 */
class MerchantGateway
{
	/** Column(type="int") */
	private $merchant_gateway_id;
	/** Column(type="string",length="255") */
	private $merchant_gateway_name;
	/** Column(type="string",length="255") */
	private $merchant_gateway_class;
	
	public function getMerchantGatewayId() { return $this->merchant_gateway_id; }
	public function getMerchantGatewayName() { return $this->merchant_gateway_name; }
	public function getMerchantGatewayClass() { return $this->merchant_gateway_class; }
	
	public function setMerchantGatewayId( $value ) { $this->merchant_gateway_id = $value; }
	public function setMerchantGatewayName( $value ) { $this->merchant_gateway_name = $value; }
	public function setMerchantGatewayClass( $value ) { $this->merchant_gateway_class = $value; }
}