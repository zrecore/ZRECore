<?php

class Admin_IndexController extends Controller_Module_Admin
{
	public function init() 
	{
		parent::init();
		$this->view->title = 'Dashboard';
		
	}

	public function indexAction()
	{
		//$this->view->message = "Hello, World!";
		
	}
	public function themeAction()
	{
		
	}
}