<?php
namespace Commerce;

/**
 * @Entity
 * @Table(name="subscription")
 */
class Subscription
{
        /** @Id @Column(type="integer") @GeneratedValue */
	private $subscription_id;
        /**
	 * @OneToOne(targetEntity="Commerce\Currency") 
	 * @JoinColumn(name="currency_id_fk", referencedColumnName="currency_id")
	 */
        private $subscriptionCurrency;
        /** @Column(type="string",length=15) */
        private $subscription_name;
        /** @Column(type="string") */
        private $subscription_description;
        /** @Column(type="string") */
        private $subscription_terms;
        /** @Column(type="float") */
        private $subscription_signup_fee;
        /** @Column(type="integer") */
        private $subscription_is_recurring;
        /** @Column(type="integer") */
        private $subscription_recurs_every_amount;
        /** @Column(type="string",length=32) */
        private $subscription_recurs_every_unit;
        /** @Column(type="integer") */
        private $subscription_recurs_max_amount;
        /** @Column(type="float") */
        private $subscription_price_per_unit;
        /** @Column(type="integer") */
        private $subscription_is_available;
        
        public function getSubscriptionId() { return $this->subscription_id; }
        public function getSubscriptionCurrency() { return $this->subscriptionCurrency; }
        public function getSubscriptionName() { return $this->subscription_name; }
        public function getSubscriptionDescription() { return $this->subscription_description; }
        public function getSubscriptionTerms() { return $this->subscription_terms; }
        public function getSubscriptionSignupFee() { return $this->subscription_signup_fee; }
        public function getSubscriptionIsRecurring() { return $this->subscription_is_recurring; }
        public function getSubscriptionRecursEveryAmount() { return $this->subscription_recurs_every_amount; }
        public function getSubscriptionRecursEveryUnit() { return $this->subscription_recurs_every_unit; }
        public function getSubscriptionRecursMaxAmount() { return $this->subscription_recurs_max_amount; }
        public function getSubscriptionPricePerUnit() { return $this->subscription_price_per_unit; }
        public function getSubscriptionIsAvailable() { return $this->subscription_is_available; }
        
        public function setSubscriptionId( $value ) { $this->subscription_id = $value; }
        public function setSubscriptionCurrency( $value ) { $this->subscriptionCurrency = $value; }
        public function setSubscriptionName( $value ) { $this->subscription_name = $value; }
        public function setSubscriptionDescription( $value ) { $this->subscription_description = $value; }
        public function setSubscriptionTerms( $value ) { $this->subscription_terms = $value; }
        public function setSubscriptionSignupFee( $value ) { $this->subscription_signup_fee = $value; }
        public function setSubscriptionIsRecurring( $value ) { $this->subscription_is_recurring = $value; }
        public function setSubscriptionRecursEveryAmount( $value ) { $this->subscription_recurs_every_amount = $value; }
        public function setSubscriptionRecursEveryUnit( $value ) { $this->subscription_recurs_every_unit = $value; }
        public function setSubscriptionRecursMaxAmount( $value ) { $this->subscription_recurs_max_amount = $value; }
        public function setSubscriptionPricePerUnit( $value ) { $this->subscription_price_per_unit = $value; }
        public function setSubscriptionIsAvailable( $value ) { $this->subscription_is_available = $value; }
}