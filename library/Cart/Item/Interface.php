<?php

interface Cart_Item_Interface
{
	/**
	 * Constructor. Instantiate a new Cart Item, according to the item ID.
	 */
	public function __construct($item_id);
	/**
	 * Is this item tangible or not.
	 * @return bool
	 */
	public function isTangible();
	/**
	 * Is this item a finite resource?
	 * @return bool
	 */
	public function isFinite();
	/**
	 * How many of these items are available.
	 * @return bool
	 */
	public function getFiniteAmountAvailable();
	public function setFiniteAmountAvailable($value);
	/**
	 * 
	 */
	public function getFiniteUnitOfMeasure();
	public function setFiniteUnitOfMeasure();
	
	public function isPerishable();
	public function getPerishableDate();
	public function setPerishableDate();
	
	/**
	 * Determine whether or not this item is available.
	 * @return bool
	 */
	public function isAvailable();
	
	
	public function getMaxPurchaseAmount();
	public function getMinPurchaseAmount();
	
	
	public function getWeight();
	public function setWeight();
	public function getWeightUnitOfMeasure();
	public function setWeightUnitOfMeasure();
	
	public function getMetrics();
	public function setMetrics();
	public function getMetricUnitOfMeasure();
	public function setMetricUnitOfMeasure();
	
	/**
	 * Does this item have a set availability date/time?
	 * @return bool
	 */
	public function getAvailabilityDate();
	
	/* ------- Permission ------- */
	/**
	 * 
	 */
	public function getPermissions();
	public function setPermissions();
}