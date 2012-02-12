<?php
namespace Commerce;

/**
 * @Entity
 * @Table(name="item")
 */
class Item
{
	/** @Id @Column(type="integer") @GeneratedValue */
	private $item_id;
	
	/** @Column(type="string",length=255) */
	private $item_name;
	/** @Column(type="string",length=255) */
	private $item_slug;
	/** @Column(name="item_sku",type="string",length=255) */
	private $item_sku;
	/** @Column(type="text") */
	private $item_description;
	/** @Column(type="decimal") */
	private $price;
	
	/**
	 * @OneToOne(targetEntity="Currency") 
	 * @JoinColumn(name="currency_id_fk", referencedColumnName="currency_id")
	 */
	private $currency;
	/**
	 * @OneToOne(targetEntity="Category") 
	 * @JoinColumn(name="category_id_fk", referencedColumnName="category_id")
	 */
	private $category;
	
	/** @Column(type="integer") */
	private $availability_date;
	/** @Column(type="integer",nullable=true) */
	private $finite_amount_available;
	/** @Column(type="string",length=32,nullable=true) */
	private $finite_unit_of_measure;
	/** @Column(type="integer") */
	private $max_purchase_amount;
	/** @Column(type="string",length=32,nullable=true) */
	private $metric_unit_of_measure;
	/** @Column(type="decimal",nullable=true) */
	private $metric_width;
	/** @Column(type="decimal",nullable=true) */
	private $metric_height;
	/** @Column(type="decimal",nullable=true) */
	private $metric_depth;
	/** @Column(type="integer") */
	private $min_purchase_amount;
	/** @Column(type="integer",nullable=true) */
	private $perishable_date;
	/** @Column(type="decimal",nullable=true) */
	private $weight;
	/** @Column(type="string",length=32,nullable=true) */
	private $weight_unit_of_measure;
	/** @Column(type="integer") */
	private $is_available;
	/** @Column(type="integer") */
	private $is_finite;
	/** @Column(type="integer") */
	private $is_perishable;
	/** @Column(type="integer") */
	private $is_tangible;
	/** @Column(type="integer") */
	private $item_timestamp_added;
	/** @Column(type="integer",nullable=true) */
	private $item_timestamp_modified;
	/** @Column(type="integer",nullable=true) */
	private $item_timestamp_deactivated;
	
	public function __construct()
	{
		$this->is_available = 0;
		$this->is_finite = 1;
		$this->is_perishable = 0;
		$this->is_tangible = 1;
	}
	
	public function getItemId()	{ return $this->item_id; }
	public function getItemName()	{ return $this->item_name; }
	public function getItemSlug()	{ return $this->item_slug; }
	public function getItemSku()	{ return $this->item_sku; }
	public function getItemDescription() { return $this->item_description; }
	public function getPrice()	{ return $this->price; }
	public function getCurrency()	{ return $this->currency; }
	public function getCategory()	{ return $this->category; }
	public function getAvailabilityDate() { return $this->availability_date; }
	public function getFiniteAmountAvailable() { return $this->finite_amount_available; }
	public function getFiniteUnitOfMeasure() { return $this->finite_unit_of_measure; }
	public function getMaxPurchaseAmount() { return $this->max_purchase_amount; }
	public function getMetricUnitOfMeasure() { return $this->metric_unit_of_measure; }
	public function getMetricWidth() { return $this->metric_width; }
	public function getMetricHeight() { return $this->metric_height; }
	public function getMetricDepth() { return $this->metric_depth; }
	public function getMinPurchaseAmount() { return $this->min_purchase_amount; }
	public function getPerishableDate() { return $this->perishable_date; }
	public function getWeight() { return $this->weight; }
	public function getWeightUnitOfMeasure() { return $this->weight_unit_of_measure; }
	public function getIsAvailable() { return $this->is_available; }
	public function getIsFinite() { return $this->is_finite; }
	public function getIsPerishable() { return $this->is_perishable; }
	public function getIsTangible() { return $this->is_tangible; }
	public function getItemTimestampAdded() { return $this->item_timestamp_added; }
	public function getItemTimestampModified() { return $this->item_timestamp_modified; }
	public function getItemTimestampDeactivated() { return $this->item_timestamp_deactivated; }
	
	public function setItemId($value)	{ $this->item_id = $value; }
	public function setItemName($value)	{ $this->item_name = $value; }
	public function setItemSlug($value)	{ $this->item_slug = $value; }
	public function setItemSku($value)	{ $this->item_sku = $value; }
	public function setItemDescription($value) { $this->item_description = $value; }
	public function setPrice($value)	{ $this->price = $value; }
	public function setCurrency($value)	{ $this->currency = $value; }
	public function setCategory($value)	{ $this->category = $value; }
	public function setAvailabilityDate($value) { $this->availability_date = $value; }
	public function setFiniteAmountAvailable($value) { $this->finite_amount_available = $value; }
	public function setFiniteUnitOfMeasure($value) { $this->finite_unit_of_measure = $value; }
	public function setMaxPurchaseAmount($value) { $this->max_purchase_amount = $value; }
	public function setMetricUnitOfMeasure($value) { $this->metric_unit_of_measure = $value; }
	public function setMetricWidth($value) { $this->metric_width = $value; }
	public function setMetricHeight($value) { $this->metric_height = $value; }
	public function setMetricDepth($value) { $this->metric_depth = $value; }
	public function setMinPurchaseAmount($value) { $this->min_purchase_amount = $value; }
	public function setPerishableDate($value) { $this->perishable_date = $value; }
	public function setWeight($value) { $this->weight = $value; }
	public function setWeightUnitOfMeasure($value) { $this->weight_unit_of_measure = $value; }
	public function setIsAvailable($value) { $this->is_available = $value; }
	public function setIsFinite($value) { $this->is_finite = $value; }
	public function setIsPerishable($value) { $this->is_perishable = $value; }
	public function setIsTangible($value) { $this->is_tangible = $value; }
	public function setItemTimestampAdded($value) { $this->item_timestamp_added = $value; }
	public function setItemTimestampModified($value) { $this->item_timestamp_modified = $value; }
	public function setItemTimestampDeactivated($value) { $this->item_timestamp_deactivated = $value; }
}