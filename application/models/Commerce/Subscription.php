<?php
namespace Commerce;

/**
 * @Entity
 * @Table(name="subscription")
 */
class Subscription
{
	private $subscription_id;
        
        private $subscriptionCurrency;
        
        private $subscription_name;
        private $subscription_description;
        private $subscription_terms;
        private $subscription_signup_fee;
        private $subscription_is_recurring;
        private $subscription_recurs_every_amount;
        private $subscription_recurs_every_unit;
        private $subscription_recurs_max_amount;
        private $subscription_price_per_unit;
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