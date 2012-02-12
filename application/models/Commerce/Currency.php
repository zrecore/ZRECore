<?php
namespace Commerce;

/**
 * @Entity
 * @Table(name="currency")
 */
class Currency
{
	/** @Id @Column(type="integer") @GeneratedValue */
	private $currency_id;
	/** @Column(type="string",length=3) */
	private $currency_code;
	/** @Column(type="string",length=255) */
	private $currency_name;
	/** @Column(type="integer") */
	private $currency_is_default;
	
	public function __construct()
	{
		$this->currency_is_default = 0;
	}
	
	public function getCurrencyId() { return $this->currency_id; }
	public function getCurrencyCode() { return $this->currency_code; }
	public function getCurrencyName() { return $this->currency_name; }
	public function getCurrencyIsDefault() { return $this->currency_is_default; }
	
	public function setCurrencyId($value) { $this->currency_id = $value; }
	public function setCurrencyCode($value) { $this->currency_code = $value; }
	public function setCurrencyName($value) { $this->currency_name = $value; }
	public function setCurrencyIsDefault($value) { $this->currency_is_default = $value; }
}