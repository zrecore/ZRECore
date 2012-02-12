<?php
namespace Commerce;

/**
 * @Entity
 * @Table(name="coupon")
 */
class Coupon
{
	/* @Id @Column(type="integer") @GeneratedValue */
	private $coupon_id;
	
	/** @Column(type="string",length=255) */
	private $coupon_code;
	/** @Column(type="int") */
	private $coupon_start_date;
	/** @Column(type="int",nullable=true) */
	private $coupon_end_date;
	/** @Column(type="int")*/
	private $coupon_is_active;
	/** @Column(type="float")*/
	private $coupon_item_price;
	/** @Column(type="float",nullable=true)*/
	private $coupon_service_price_per_unit;
	/** @Column(type="float",nullable=true)*/
	private $coupon_subscription_signup_fee;
	/** @Column(type="float",nullable=true)*/
	private $coupon_subscription_price_per_unit;
	
	public function __construct() {
		$this->coupon_is_active = 0;
	}
	
	public function getCouponId() { return $this->coupon_id; }
	public function getCouponCode() { return $this->coupon_code; }
	public function getCouponStartDate() { return $this->coupon_start_date; }
	public function getCouponEndDate() { return $this->coupon_end_date; }
	public function getCouponIsActive() { return $this->coupon_is_active; }
	public function getCouponItemPrice() { return $this->coupon_item_price; }
	public function getCouponServicePricePerUnit() { return $this->coupon_service_price_per_unit; }
	public function getCouponSubscriptionSignupFee() { return $this->coupon_subscription_signup_fee; }
	public function getCouponSubscriptionPricePerUnit() { return $this->coupon_subscription_price_per_unit; }
	
	public function setCouponId( $value ) { $this->coupon_id = $value; }
	public function setCouponCode( $value ) { $this->coupon_code = $value; }
	public function setCouponStartDate( $value ) { $this->coupon_start_date = $value; }
	public function setCouponEndDate( $value ) { $this->coupon_end_date = $value; }
	public function setCouponIsActive( $value ) { $this->coupon_is_active = $value; }
	public function setCouponItemPrice( $value ) { $this->coupon_item_price = $value; }
	public function setCouponServicePricePerUnit( $value ) { $this->coupon_service_price_per_unit = $value; }
	public function setCouponSubscriptionSignupFee( $value ) { $this->coupon_subscription_signup_fee = $value; }
	public function setCouponSubscriptionPricePerUnit( $value ) { $this->coupon_subscription_price_per_unit = $value; }
}