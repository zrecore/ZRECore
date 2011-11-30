<?php

class Admin_IndexController extends Controller_Module_Admin
{
	
	public function init() 
	{
		parent::init();
		$t = $this->translate;
		$this->view->title = $t->_('Dashboard');
		
	}

	public function indexAction()
	{
		
	}
}