<?php
namespace Commerce;

/**
 * @Entity
 * @Table(name="itemProperty")
 */
class ItemProperty
{
	/**
	 * @OneToOne(targetEntity="Item") 
	 * @JoinColumn(name="item_id_fk", referencedColumnName="item_id")
	 */
	private $item;
	/**
	 * @OneToOne(targetEntity="Property") 
	 * @JoinColumn(name="property_id_fk", referencedColumnName="property_id")
	 */
	private $property;
	
	public function getItem() { return $this->item; }
	public function getProperty() { return $this->property; }
	
	public function setItem( $value ) { $this->item = $value; }
	public function setProperty( $value ) { $this->property = $value; }
}