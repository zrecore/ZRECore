<?php

class Controller_Module_Admin extends Zend_Controller_Action
{
	protected $translate = null;
	public function init()
	{
		
		$this->_helper->layout->setLayout('layout-admin-content-left');
		
		/* Initialize action controller here */
		$request = $this->getRequest();
		
		$module = $request->getModuleName();
		$controller = $request->getControllerName();
		$action = $request->getActionName();
		
		
		$relative_filename = '/' . $module . '/' . $controller . '/' . $action;
		
		$js_file = '/script' . $relative_filename . '.js';
		$css_file = '/style' . $relative_filename . '.css';
		
		if (file_exists(APPLICATION_PATH . '/../public' . $js_file))
			$this->view->headScript()->appendFile( $js_file );
		
		if (file_exists(APPLICATION_PATH . '/../public' . $css_file))
			$this->view->headLink()->appendStylesheet( $css_file );
		
		$this->view->title = "ZRECommerce (v2.0.0)";
		
		$this->translate = $this->view->translate = $t = $this->getInvokeArg('bootstrap')->getResource('translate');
		parent::init();
	}
	
}