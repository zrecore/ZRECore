<?php
namespace Commerce;

/**
 * @Entity
 * @Table(name="propertyType")
 */
class propertyType
{
	/* @Id @Column(type="integer") @GeneratedValue */
	private $property_type_id;
	/** @Column(type="string",length=255) */
	private $property_type;
	
	public function getPropertyTypeId() { return $this->property_type_id; }
	public function getPropertyType() { return $this->property_type; }
	
	public function setPropertyTypeId( $value ) { $this->property_type_id = $value; }
	public function setPropertyType( $value ) { $this->property_type = $value; }
}