<?php
namespace Commerce;

/**
 * @Entity
 * @Table(name="serviceCoupon")
 */
class ServiceCoupon
{
        /**
	 * @OneToOne(targetEntity="Commerce\Service") 
	 * @JoinColumn(name="service_id_fk", referencedColumnName="service_id")
	 */
	private $service;
        /**
	 * @OneToOne(targetEntity="Commerce\Coupon") 
	 * @JoinColumn(name="coupon_id_fk", referencedColumnName="coupon_id")
	 */
        private $coupon;
        
        public function getService() { return $this->service; }
        public function getCoupon() { return $this->coupon; }
        
        public function setService( $value ) { $this->service = $value; }
        public function setCoupon( $value ) { $this->coupon = $value; }
}