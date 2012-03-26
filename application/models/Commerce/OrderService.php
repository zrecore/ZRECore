<?php
namespace Commerce;

/**
 * @Entity
 * @Table(name="orderService")
 */
class OrderService
{
	/**
	 * @OneToOne(targetEntity="Order") 
	 * @JoinColumn(name="order_id_fk", referencedColumnName="order_id")
	 */
	private $order;
	/**
	 * @OneToOne(targetEntity="Service") 
	 * @JoinColumn(name="service_id_fk", referencedColumnName="service_id")
	 */
	private $service;
	/** @Column(type="decimal") */
	private $order_service_price;
	/** @Column(type="decimal") */
	private $order_service_units;
	/** @Column(type="integer") */
	private $order_service_date_start;
	/** @Column(type="integer") */
	private $order_service_date_end;
	
	public function getOrder() { return $this->order; }
	public function getService() { return $this->service; }
	public function getOrderServicePrice() { return $this->order_service_price; }
	public function getOrderServiceUnits() { return $this->order_service_units; }
	public function getOrderServiceDateStart() { return $this->order_service_date_start; }
	public function getOrderServiceDateEnd() { return $this->order_service_date_end; }
	
	public function setOrder($value) { $this->order = $value; }
	public function setService($value) { $this->service = $value; }
	public function setOrderServicePrice($value) { $this->order_service_price = $value; }
	public function setOrderServiceUnits($value) { $this->order_service_units = $value; }
	public function setOrderServiceDateStart($value) { $this->order_service_date_start = $value; }
	public function setOrderServiceDateEnd($value) { $this->order_service_date_end = $value; }
	
}