<?php

class Api_ContentController extends Zend_Rest_Controller
{
        public function init()
        {
                $bootstrap = $this->getInvokeArg('bootstrap');
                $options = $bootstrap->getOption('resources');
                
                $contextSwitch = $this->_helper->getHelper('contextSwitch');
                $contextSwitch->addActionContext('index', array('xml', 'json'))->initContext();
                
                $this->view->success = "true";
                $this->view->version = "1.0";
        }
        
        public function indexAction() {
                // Respond with a list
        }
        public function getAction() {
                $this->_forward('index');
        }
        public function postAction() {
                $this->_forward('index');
        }
        public function putAction() {
                $this->_forward('index');
        }
        public function deleteAction() {
                $this->_forward('index');
        }
}