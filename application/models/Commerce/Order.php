<?php
namespace Commerce;

/**
 * @Entity
 * @Table(name="order")
 */
class Order
{
	/** @Id @Column(type="integer") @GeneratedValue */
	private $order_id;
	/** @Column(type="float") */
	private $order_amount_total;
	/** @Column(type="int") */
	private $order_date;
	/** @Column(type="int") */
	private $order_modified_date;
	/** @Column(type="string", length=15) */
	private $order_ip;
	/** @Column(type="string",length=255) */
	private $order_email;
	/** @Column(type="string",length=255) */
	private $order_address1;
	/** @Column(type="string",length=255) */
	private $order_address2;
	/** @Column(type="string",length=255) */
	private $order_city;
	/** @Column(type="string",length=255) */
	private $order_state_province;
	/** @Column(type="string",length=16) */
	private $order_zip_code;
	/** @Column(type="string",length=32) */
	private $order_phone1;
	/** @Column(type="string",length=32) */
	private $order_phone2;
	/** @Column(type="text") */
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
	
	
	public function getOrderId() { return $this->order_id; }
	public function getOrderAmountTotal() { return $this->order_amount_total; }
	public function getOrderDate() { return $this->order_date; }
	public function getOrderModifiedDate() { return $this->order_modified_date; }
	public function getOrderIp() { return $this->order_ip; }
	public function getOrderEmail() { return $this->order_email; }
	public function getOrderAddress1() { return $this->order_address1; }
	public function getOrderAddress2() { return $this->order_address2; }
	public function getOrderCity() { return $this->order_city; }
	public function getOrderStateProvince() { return $this->order_state_province; }
	public function getOrderZipCode() { return $this->order_zip_code; }
	public function getOrderPhone1() { return $this->order_phone1; }
	public function getOrderPhone2() { return $this->order_phone2; }
	public function getOrderNotes() { return $this->order_notes; }
	
	public function getOrderCreationUser() { return $this->orderCreationUser; }
	public function getOrderLastModifiedByUser() { return $this->orderLastModifiedByUser; }
	public function getOrderStatus() { return $this->orderStatus; }
	public function getOrderMerchantGateway() { return $this->orderMerchantGateway; }
	
	public function setOrderId($value) { $this->order_id = $value; }
	public function setOrderAmountTotal($value) { $this->order_amount_total = $value; }
	public function setOrderDate($value) { $this->order_date = $value; }
	public function setOrderModifiedDate($value) { $this->order_modified_date = $value; }
	public function setOrderIp($value) { $this->order_ip = $value; }
	public function setOrderEmail($value) { $this->order_email = $value; }
	public function setOrderAddress1($value) { $this->order_address1 = $value; }
	public function setOrderAddress2($value) { $this->order_address2 = $value; }
	public function setOrderCity($value) { $this->order_city = $value; }
	public function setOrderStateProvince($value) { $this->order_state_province = $value; }
	public function setOrderZipCode($value) { $this->order_zip_code = $value; }
	public function setOrderPhone1($value) { $this->order_phone1 = $value; }
	public function setOrderPhone2($value) { $this->order_phone2 = $value; }
	public function setOrderNotes($value) { $this->order_notes = $value; }
	
	public function setOrderCreationUser($value) { $this->orderCreationUser = $value; }
	public function setOrderLastModifiedByUser($value) { $this->orderLastModifiedByUser = $value; }
	public function setOrderStatus($value) { $this->orderStatus = $value; }
	public function setOrderMerchantGateway($value) {$this->orderMerchantGateway = $value;}
}