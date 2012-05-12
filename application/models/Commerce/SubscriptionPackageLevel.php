<?php
namespace Commerce;

/**
 * @Entity
 * @Table(name="subscriptionPackageLevel")
 */
class SubscriptionPackageLevel
{
        /**
	 * @OneToOne(targetEntity="Commerce\Subscription") 
	 * @JoinColumn(name="subscription_id_fk", referencedColumnName="subscription_id")
	 */
	private $subscription;
        /**
	 * @OneToOne(targetEntity="Commerce\PackageLevel") 
	 * @JoinColumn(name="package_level_id_fk", referencedColumnName="package_level_id")
	 */
        private $packageLevel;
        
        public function getSubscription() { return $this->subscription; }
        public function getPackageLevel() { return $this->packageLevel; }
        
        public function setSubscription( $value ) { $this->subscription = $value; }
        public function setPackageLevel( $value ) { $this->packageLevel = $value; }
}