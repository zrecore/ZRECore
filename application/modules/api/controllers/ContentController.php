<?php

class Api_ContentController extends Zend_Rest_Controller {

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
	
	private function checkAuthentication()
	{
		$action = $this->_getParam('action');
		$nonPrivilegedActions = array('index','get');
		
		// @todo Hook into ACL instead.
		$require_auth = !in_array($action, $nonPrivilegedActions);
		
		if ($require_auth == true)
		{
			$auth = Zend_Auth::getInstance();
			
			if (!$auth->hasIdentity())
			{
				// Access Denied;
				$this->_forward(
					'access-denied', 
					'authenticate', 
					'api', 
					array(
						'format' => $this->_getParam('format')
					)
				);
			}
		}
	}

	public function indexAction() {
		
		// Respond with a list
		$this->view->message = "List of resources.";
		
		$offset = intval($this->_getParam('offset', 0));
		$count = intval($this->_getParam('count', 30));
		
		$this->view->offset = $offset;
		$this->view->count = $count;
		
		$em = Zend_Registry::get('Entitymanager');
		$model = $em->getRepository('Content\Post');
		
		if (!empty($model) && $model instanceof Content\Post)
		{
			$this->view->is_post_model = 1;
			
		}
		$this->getResponse()->setHttpResponseCode(200);
	}

	public function getAction() {
		
		$this->view->message = sprintf( "Resource #%s", $this->_getParam('id') );
		$this->getResponse()->setHttpResponseCode(200);
	}

	public function postAction() {
		// Check authentication
		$this->checkAuthentication();
		
		$this->view->message = "Resource Created";
		$this->getResponse()->setHttpResponseCode(201);
	}

	public function putAction() {
		// Check authentication
		$this->checkAuthentication();
		
		$this->view->message = sprintf( "Resource #%s Updated", $this->_getParam('id') );
		$this->getResponse()->setHttpResponseCode(201);
	}

	public function deleteAction() {
		// Check authentication
		$this->checkAuthentication();
		
		$this->view->message = sprintf( "Resource #%s Deleted", $this->_getParam('id') );
		$this->getResponse()->setHttpResponseCode(200);
	}

}