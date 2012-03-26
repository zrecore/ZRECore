<?php
namespace Commerce;

/**
 * @Entity
 * @Table(name="orderSubscription")
 */
class OrderSubscription
{	
	/**
	 * @OneToOne(targetEntity="Order") 
	 * @JoinColumn(name="order_id_fk", referencedColumnName="order_id")
	 */
	private $order; /**
	 * @OneToOne(targetEntity="Subscription") 
	 * @JoinColumn(name="subscription_id_fk", referencedColumnName="subscription_id")
	 */
	private $subscription; 
	/** Column(type="decimal") */
	private $order_subscription_price; 
	/** Column(type="int") */
	private $order_subscription_date_start; 
	/** Column(type="int") */
	private $order_subscription_date_end; 
	
	public function getOrder() { return $this->order; }
	public function getSubscription() { return $this->subscription; }
	public function getOrderSubscriptionPrice() { return $this->order_subscription_price; }
	public function getOrderSubscriptionDateStart() { return $this->order_subscription_date_start; }
	public function getOrderSubscriptionDateEnd() { return $this->order_subscription_date_end; }

	public function setOrder($order) { $this->order = $order; }
	public function setSubscription($subscription) { $this->subscription = $subscription; }
	public function setOrderSubscriptionPrice($order_subscription_price) { $this->order_subscription_price = $order_subscription_price; }
	public function setOrderSubscriptionDateStart($order_subscription_date_start) { $this->order_subscription_date_start = $order_subscription_date_start; }
	public function setOrderSubscriptionDateEnd($order_subscription_date_end) { $this->order_subscription_date_end = $order_subscription_date_end; }
}