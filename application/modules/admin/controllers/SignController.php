<?php

class Admin_SignController extends Controller_Module_Admin
{
	protected $require_auth = 0;
	
	public function init()
	{
		parent::init();
		
		$this->_helper->layout->setLayout('layout-admin-modal');
	}
	public function inAction()
	{
		$t = $this->translate;
		
		$this->view->title = $t->_('Sign In');
		$request = $this->getRequest();
		
		// Form submitted?
		$is_submitted = $request->getParam('submit');
		if (isset($is_submitted)) {
			
			$username = $request->getParam('username');
			$password = $request->getParam('password');
			
			Auth::authenticate($username, $password);
			
			$auth = Zend_Auth::getInstance();
			
			if ($auth->hasIdentity()) {
				$this->_redirect('/admin/');
			}
		}
	}
	
	public function outAction()
	{
		$auth = Zend_Auth::getInstance();
		$auth->clearIdentity();
		
		$this->_redirect('/admin/sign/in/');
	}
}