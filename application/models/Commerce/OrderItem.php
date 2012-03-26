<?php
namespace Commerce;

/**
 * @Entity
 * @Table(name="orderItem")
 */
class OrderItem
{
	/**
	 * @OneToOne(targetEntity="Order") 
	 * @JoinColumn(name="order_id_fk", referencedColumnName="order_id")
	 */
	private $order;
	/**
	 * @OneToOne(targetEntity="Item") 
	 * @JoinColumn(name="item_id_fk", referencedColumnName="item_id")
	 */
	private $item;
	/** @Column(type="decimal") */
	private $order_item_price;
	/** @Column(type="integer") */
	private $order_item_quantity;
	/** @Column(type="integer") */
	private $order_item_ship_date;
	
	public function getOrder() { return $this->order; }
	public function getItem() { return $this->item; }
	public function getOrderItemPrice() { return $this->order_item_price; }
	public function getOrderItemQuantity() { return $this->order_item_quantity; }
	public function getOrderItemShipDate() { return $this->order_item_ship_date; }
	
	public function setOrder($value) { $this->order = $value; }
	public function setItem($value) { $this->item = $value; }
	public function getOrderItemPrice($value) { $this->order_item_price = $value; }
	public function getOrderItemQuantity($value) { $this->order_item_quantity = $value; }
	public function getOrderItemShipDate($value) { $this->order_item_ship_date = $value; }
}