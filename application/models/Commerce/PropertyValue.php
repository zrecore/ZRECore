<?php
namespace Commerce;

/**
 * @Entity
 * @Table(name="propertyValue")
 */
class PropertyValue
{
	private $property_value_id;
	private $property_value_text;
	private $propertyType;
}