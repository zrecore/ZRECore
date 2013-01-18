<?php

class Cart_Item_Abstract
{
	
	private $_item_id;
	private $_item_name;
	private $_item_sku;
	private $_item_description;
	private $_category_id_fk;
	private $_availability_date;
	private $_finite_amount_available;
	private $_finite_unit_of_measure;
	private $_price;
	private $_currency;
	private $_max_purchase_amount;
	private $_metric_unit_of_measure;
	private $_metric_width;
	private $_metric_height;
	private $_metric_depth;
	private $_min_purchase_amount;
	private $_perishable_date;
	private $_weight;
	private $_weight_unit_of_measure;
	private $_is_available;
	private $_is_finite;
	private $_is_perishable;
	private $_is_tangible;
	
	public function __set($name, $value) {
		echo "Setting $name = $value<br />\n";
	}
	
	public function __get($name) {
		echo "Getting $name<br />\n";
	}
}