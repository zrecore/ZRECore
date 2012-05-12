<?php
namespace Commerce;

/**
 * @Entity
 * @Table(name="orderStatusHistory")
 */
class OrderStatusHistory
{
	/** Column(type="integer") */
	private $order_status_id;
	/**
	 * @OneToOne(targetEntity="Status") 
	 * @JoinColumn(name="status_id_fk", referencedColumnName="status_id")
	 */
	private $status;
	/** Column(type="integer") */
	private $change_date;
	
	public function getOrderStatusId() { return $this->order_status_id; }
	public function getStatus() { return $this->status; }
	public function getChangeDate() { return $this->change_date; }
	
	public function setOrderStatusId($value) { $this->order_status_id = $value; }
	public function setStatus($value) { $this->status = $value; }
	public function setChangeDate($value) { $this->change_date = $value; }
}