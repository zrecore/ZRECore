<?php
namespace Commerce;

/**
 * @Entity
 * @Table(name="itemCoupon")
 */
class ItemCoupon
{
	/**
	 * @OneToOne(targetEntity="Item") 
	 * @JoinColumn(name="item_id_fk", referencedColumnName="item_id")
	 */
	private $item;
	/**
	 * @OneToOne(targetEntity="Coupon") 
	 * @JoinColumn(name="coupon_id_fk", referencedColumnName="coupon_id")
	 */
	private $coupon;
	
	public function getItem() { return $this->item; }
	public function getCoupon() { return $this->coupon; }
	
	public function setItem( $value ) { $this->item = $value; }
	public function setCoupon( $value ) { $this->coupon = $value; }
}