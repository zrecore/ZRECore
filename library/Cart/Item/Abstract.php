<?php

class Cart_Item_Abstract
{
	
	private $_item_id;
	private $_availabilityDate;
	private $_finiteAmountAvailable;
	private $_finiteUnitOfMeasure;
	private $_maxPurchaseAmount;
	private $_metricUnitOfMeasure;
	private $_metrics;
	private $_minPurchaseAmount;
	private $_perishableDate;
	private $_permissions;
	private $_weight;
	private $_weightUnitOfMeasure;
	private $_available;
	private $_finite;
	private $_perishable;
	private $_tangible;
	
	public function __set($name, $value) {
		echo "Setting $name = $value<br />\n";
	}
	
	public function __get($name) {
		echo "Getting $name<br />\n";
	}
}