<?php
namespace Commerce;

/**
 * @Entity
 * @Table(name="packageLevel")
 */
class PackageLevel
{
	/** @Id @Column(type="integer") @GeneratedValue */
	private $package_level_id;
	/** Column(type="string", length=32) */
	private $package_level_name;
	/** @Column(type="integer") */
	private $package_level_is_available;
	/**
	 * @todo Add Setter/Getter methods
	 */
	
	public function getPackageLevelId() { return $this->package_level_id; }
	public function getPackageLevelName() { return $this->package_level_name; }
	public function getPackageLevelIsAvailable() { return $this->package_level_is_available; }
	
	public function setPackageLevelId( $value ) { $this->package_level_id = $value; }
	public function setPackageLevelName( $value ) { $this->package_level_name = $value; }
	public function setPackageLevelIsAvailable( $value ) { $this->package_level_is_available; }
	
}