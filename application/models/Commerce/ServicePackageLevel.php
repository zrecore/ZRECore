<?php
namespace Commerce;

/**
 * @Entity
 * @Table(name="servicePackageLevel")
 */
class ServicePackageLevel
{
        /**
	 * @OneToOne(targetEntity="Commerce\Service") 
	 * @JoinColumn(name="service_id_fk", referencedColumnName="service_id")
	 */
	private $service;
        /**
	 * @OneToOne(targetEntity="Commerce\PackageLevel") 
	 * @JoinColumn(name="package_level_id_fk", referencedColumnName="package_level_id")
	 */
        private $packageLevel;
        
        public function getService() { return $this->service; }
        public function getPackageLevel() { return $this->packageLevel; }
        
        public function setService( $value ) { $this->service = $value; }
        public function setPackageLevel( $value ) { $this->packageLevel = $value; }
}