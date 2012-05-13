<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

        public function _initAutloader() {
                $autoloader = Zend_Loader_Autoloader::getInstance();

                require_once 'Doctrine/Common/ClassLoader.php';
                $doctrineAutoloader = array(new \Doctrine\Common\ClassLoader, 'loadClass');
                $autoloader->pushAutoloader($doctrineAutoloader, 'Doctrine');
        }

        public function _initRoutes() {
                $this->bootstrap('Request');
                $front = $this->getResource('FrontController');
                $restRoute = new Zend_Rest_Route($front, array(), array(
                                'api' => array('authenticate', 'commerce', 'content')
                        ));
                $front->getRouter()->addRoute('rest', $restRoute);
        }

        public function _initRequest() {
                $this->bootstrap('FrontController');
                $front = $this->getResource('FrontController');
                $request = $front->getRequest();
                
                if (null === $front->getRequest()) {
                        $request = new Zend_Controller_Request_Http();
                        $front->setRequest($request);
                }
                
                return $request;
        }
        public function _initRegistry() {
                $registry = Zend_Registry::getInstance();
        }

        public function _initPaymentGateways() {
                /**
                 * Initialize our PayPal constants.
                 */
                $paypal = $this->getOption('paypal');

                foreach ($paypal as $key => $entry) {
                        $const = 'PAYPAL_' . strtoupper($key);
                        if (!defined($const)) {
                                define($const, $entry);
                        }
                }
        }

        public function _initObserverSubjects() {
                $observerSubjects = array(
                        'Auth' => new Auth_Observer_Subject,
                        'Cart' => new Cart_Observer_Subject,
                        'Cms' => new Cms_Observer_Subject,
                        'Service_Paypal' => new Service_Paypal_Observer_Subject
                );

                Zend_Registry::set('OBSERVER_SUBJECTS', $observerSubjects);
        }

        public function _initObservers() {
                $observerSubjects = Zend_Registry::get('OBSERVER_SUBJECTS');

                $observers = $this->getOption('observers');

                foreach ($observers as $path) {
                        $info = explode('.', basename($path));

                        // ...Only use properly named files
                        if (count($info) >= 2 && file_exists($path)) {
                                $subject = $info[0];
                                $customName = $info[1];

                                if (array_key_exists($subject, $observerSubjects)) {
                                        require_once $path;

                                        $class = 'Custom_' . $subject . '_' . $customName;
                                        $o = new $class;

                                        $observerSubjects[$subject]->attach($o);
                                }
                        }
                }

                Zend_Registry::set('OBSERVER_SUBJECTS', $observerSubjects);
        }

}

