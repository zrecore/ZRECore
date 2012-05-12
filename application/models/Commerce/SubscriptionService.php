<?php
namespace Commerce;

/**
 * @Entity
 * @Table(name="subscriptionService")
 */
class SubscriptionService
{
        /**
	 * @OneToOne(targetEntity="Commerce\Subscription") 
	 * @JoinColumn(name="subscription_id_fk", referencedColumnName="subscription_id")
	 */
	private $subscription;
        /**
	 * @OneToOne(targetEntity="Commerce\Service") 
	 * @JoinColumn(name="service_id_fk", referencedColumnName="service_id")
	 */
        private $service;
        
        public function getSubscription() { return $this->subscription; }
        public function getService() { return $this->service; }
        
        public function setSubscription( $value ) { $this->subscription = $value; }
        public function setService( $value ) { $this->service = $value; }
}