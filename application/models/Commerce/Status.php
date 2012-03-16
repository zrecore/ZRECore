<?php
namespace Commerce;

/**
 * @Entity
 * @Table(name="status")
 */
class Status
{
	/** @Column(type="int") */
	private $status_id;
	/** @Column(type="string",length=255) */
	private $status_value;
	
	public function getStatusId() { return $this->status_id; }
	public function getStatusValue() { return $this->status_value; }
	
	public function setStatusId($value) { $this->status_id = $value; }
	public function setStatusValue( $value ) { $this->status_value = $value; }
}