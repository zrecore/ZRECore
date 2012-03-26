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
}