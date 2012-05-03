<?php
namespace Commerce;

/**
 * @Entity
 * @Table(name="property")
 */
class Property
{
	/* @Id @Column(type="integer") @GeneratedValue */
	private $property_id;
	/** @Column(type="string",length=255) */
	private $property_name;
	/**
	 * @OneToOne(targetEntity="Commerce\PropertyType") 
	 * @JoinColumn(name="property_type_id_fk", referencedColumnName="property_type_id")
	 */
	private $propertyType;
	/** @Column(type="integer") */
	private $property_is_required;
	
	public function getPropertyId() { return $this->property_id; }
	public function getPropertyName() { return $this->property_name; }
	public function getPropertyType() { return $this->propertyType; }
	public function getPropertyIsRequired() { return $this->property_is_required; }
	
	public function setPropertyId( $value ) { $this->property_id = $value; }
	public function setPropertyName( $value ) { $this->property_name = $value; }
	public function setPropertyType( $value ) { $this->propertyType = $value; }
	public function setPropertyIsRequired( $value ) { $this->property_is_required = $value; }
}