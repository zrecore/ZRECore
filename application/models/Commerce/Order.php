<?php
namespace Commerce;

/**
 * @Entity
 * @Table(name="order")
 */
class Order
{
	/** Column(type="int") */
	private $order_id;
	/** Column(type="float") */
	private $order_amount_total;
	/** Column(type="int") */
	private $order_date;
	/** Column(type="int") */
	private $order_modified_date;
	/** Column(type="string", length=15) */
	private $order_ip;
	/** Column(type="string",length=255) */
	private $order_email;
	/** Column(type="string",length=255) */
	private $order_address1;
	/** Column(type="string",length=255) */
	private $order_address2;
	/** Column(type="string",length=255) */
	private $order_city;
	/** Column(type="string",length=255) */
	private $order_state_province;
	/** Column(type="string",length=16) */
	private $order_zip_code;
	/** Column(type="string",length=32) */
	private $order_phone1;
	/** Column(type="string",length=32) */
	private $order_phone2;
	/** Column(type="text") */
	private $order_notes;
	
	/**
	 * @OneToOne(targetEntity="Auth\User") 
	 * @JoinColumn(name="order_creation_user_id_fk", referencedColumnName="user_id")
	 */
	private $orderCreationUser;
	/**
	 * @OneToOne(targetEntity="Auth\User") 
	 * @JoinColumn(name="order_creation_user_id_fk", referencedColumnName="user_id")
	 */
	private $orderLastModifiedByUser;
	/**
	 * @OneToOne(targetEntity="Currency") 
	 * @JoinColumn(name="order_currency_id_fk", referencedColumnName="user_id")
	 */
	private $orderCurrency;
	/**
	 * @OneToOne(targetEntity="Auth\User") 
	 * @JoinColumn(name="order_creation_user_id_fk", referencedColumnName="user_id")
	 */
	private $orderStatus;
	/**
	 * @OneToOne(targetEntity="MerchantGateway") 
	 * @JoinColumn(name="order_merchant_gateway_id_fk", referencedColumnName="merchant_gateway_id")
	 */
	private $orderMerchantGateway;
	
}