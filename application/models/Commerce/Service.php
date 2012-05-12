<?php
namespace Commerce;

/**
 * @Entity
 * @Table(name="service")
 */
class Service
{
        /* @Id @Column(type="integer") @GeneratedValue */
	private $service_id;
        /**
	 * @OneToOne(targetEntity="Commerce\Currency") 
	 * @JoinColumn(name="service_currency_id_fk", referencedColumnName="currency_id")
	 */
        private $serviceCurrency;
        /* @Id @Column(type="integer") */
        private $service_requires_subscription;
        /* @Id @Column(type="string",length=255) */
        private $service_name;
        /* @Id @Column(type="string") */
        private $service_description;
        /* @Id @Column(type="string") */
        private $service_terms;
        /* @Id @Column(type="integer") */
        private $service_price_per_unit;
        /* @Id @Column(type="string",length=32) */
        private $service_unit_of_measure;
        /* @Id @Column(type="float",length=255) */
        private $service_unit_amount;
        /* @Id @Column(type="integer") */
        private $service_is_on_site;
        /* @Id @Column(type="integer") */
        private $service_is_availabe;
        
        public function getServiceId() { return $this->service_id; }
        public function getServiceCurrency() { return $this->serviceCurrency; }
        public function getServiceRequiresSubscription() { return $this->service_requires_subscription; }
        public function getServiceName() { return $this->service_name; }
        public function getServiceDescription() { return $this->service_description; }
        public function getServiceTerms() { return $this->service_terms; }
        public function getServicePricePerUnit() { return $this->service_price_per_unit; }
        public function getServiceUnitOfMeasure() { return $this->service_unit_of_measure; }
        public function getServiceUnitAmount() { return $this->service_unit_amount; }
        public function getServiceIsOnSite() { return $this->service_is_on_site; }
        public function getServiceIsAvailable() { return $this->service_is_availabe; }
        
        public function setServiceId( $value ) { $this->service_id = $value; }
        public function setServiceCurrency( $value ) { $this->serviceCurrency = $value; }
        public function setServiceRequiresSubscription( $value ) { $this->service_requires_subscription = $value; }
        public function setServiceName( $value ) { $this->service_name = $value; }
        public function setServiceDescription( $value ) { $this->service_description = $value; }
        public function setServiceTerms( $value ) { $this->service_terms = $value; }
        public function setServicePricePerUnit( $value ) { $this->service_price_per_unit = $value; }
        public function setServiceUnitOfMeasure( $value ) { $this->service_unit_of_measure = $value; }
        public function setServiceUnitAmount( $value ) { $this->service_unit_amount = $value; }
        public function setServiceIsOnSite( $value ) { $this->service_is_on_site = $value; }
        public function setServiceIsAvailable( $value ) { $this->service_is_availabe = $value; }
}