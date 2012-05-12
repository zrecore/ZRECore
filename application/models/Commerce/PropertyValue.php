<?php
namespace Commerce;

/**
 * @Entity
 * @Table(name="propertyValue")
 */
class PropertyValue
{
        /* @Id @Column(type="integer") @GeneratedValue */
	private $property_value_id;
        /* @Id @Column(type="string",length=255) @GeneratedValue */
	private $property_value_text;
        /**
	 * @OneToOne(targetEntity="Commerce\PropertyType") 
	 * @JoinColumn(name="property_type_id_fk", referencedColumnName="property_type_id")
	 */
	private $propertyType;
        
        public function getPropertyValueId() { return $this->property_value_id; }
        public function getPropertyValueText() { return $this->property_value_text; }
        public function getPropertyType() { return $this->propertyType; }
        
        public function setPropertyValueId( $value ) { $this->property_value_id = $value; }
        public function setPropertyValueText( $value ) { $this->property_value_text = $value; }
        public function setPropertyType( $value ) { $this->propertyType = $value; }
}