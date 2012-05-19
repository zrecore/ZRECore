<?php

class Api_AuthenticateController extends Zend_Rest_Controller {

	public function init() {
		$contextSwitch = $this->_helper->getHelper('contextSwitch');
		if ($contextSwitch instanceof Zend_Controller_Action_Helper_ContextSwitch) {
			
			$contextSwitch->addActionContexts(
				array(
					'index' => array('xml', 'json'), // List collection
					'get' => array('xml', 'json'), // Retrieve
					'post' => array('xml', 'json'), // Add
					'put' => array('xml', 'json'), // Replace collection with new collection, or replace item with new item. Create item if it doesn't exist.
					'delete' => array('xml', 'json'), // Delete item, or collection
					
					'access-denied' => array('xml', 'json')
				)
			)->initContext();
		}
		
		// Browser based HTTP support.
		$params = $this->_getAllParams();
		
		$method = $this->_getParam('_method');
		if (isset($params['_method']))
		{
			$this->_forward( strtolower($method) );
		}
	}

	public function indexAction() {
		// Respond with a list.
	}

	public function getAction() {
		
	}

	public function postAction() {
		
	}

	public function putAction() {
		
	}

	public function deleteAction() {
		
	}
	
	public function accessDeniedAction() {
		$this->view->message = 'Access Denied';
		$this->getResponse()->setHttpResponseCode(401);
	}

}