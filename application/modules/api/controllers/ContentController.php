<?php

class Api_ContentController extends Zend_Rest_Controller {

	private $_version = '1.0';

	/**
	 * @link http://en.wikipedia.org/wiki/Representational_State_Transfer 
	 * @link http://www.codeinchaos.com/post/3107629294/restful-services-with-zend-framework-part-1
	 */
	public function init() {

		$contextSwitch = $this->_helper->getHelper('contextSwitch');
		if ($contextSwitch instanceof Zend_Controller_Action_Helper_ContextSwitch) {
			
			$contextSwitch->addActionContexts(
				array(
					'index' => array('xml', 'json'), // List collection
					'get' => array('xml', 'json'), // Retrieve
					'post' => array('xml', 'json'), // Add
					'put' => array('xml', 'json'), // Replace collection with new collection, or replace item with new item. Create item if it doesn't exist.
					'delete' => array('xml', 'json') // Delete item, or collection
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
		
		// Respond with a list
		$this->view->message = "List of resources.";
		$this->getResponse()->setHttpResponseCode(200);
	}

	public function getAction() {
		
		$this->view->message = sprintf( "Resource #%s", $this->_getParam('id') );
		$this->getResponse()->setHttpResponseCode(200);
	}

	public function postAction() {
		
		$this->view->message = "Resource Created";
		$this->getResponse()->setHttpResponseCode(201);
	}

	public function putAction() {
		
		$this->view->message = sprintf( "Resource #%s Updated", $this->_getParam('id') );
		$this->getResponse()->setHttpResponseCode(201);
	}

	public function deleteAction() {
		
		$this->view->message = sprintf( "Resource #%s Deleted", $this->_getParam('id') );
		$this->getResponse()->setHttpResponseCode(200);
	}

}