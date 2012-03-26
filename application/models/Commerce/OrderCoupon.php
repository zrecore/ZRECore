<?php
namespace Commerce;

/**
 * @Entity
 * @Table(name="orderCoupon")
 */
class OrderCoupon
{
	/**
	 * @OneToOne(targetEntity="Order") 
	 * @JoinColumn(name="order_id_fk", referencedColumnName="order_id")
	 */
	private $order;
	/**
	 * @OneToOne(targetEntity="Coupon") 
	 * @JoinColumn(name="coupon_id_fk", referencedColumnName="coupon_id")
	 */
	private $coupon;
	
	public function getOrder() { return $this->order; }
	public function getCoupon() { return $this->coupon; }
	
	public function setOrder($value) { $this->order = $value; }
	public function setCoupon($value) { $this->coupon = $value; }
}