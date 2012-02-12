<?php

class Admin_OrdersController extends Controller_Module_Admin
{
	public function init() 
	{
		parent::init();
		$t = $this->translate;
		$this->view->title = $t->_('Orders');
		
	}

	public function indexAction()
	{
		
	}
}