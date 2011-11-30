<?php

class Admin_PagesController extends Controller_Module_Admin
{
	public function init() 
	{
		parent::init();
		$this->view->title = 'Pages';
		
	}

	public function allPagesAction()
	{
		$this->view->title = 'All Pages';
	}
	
	public function addNewAction()
	{
		$this->view->title = 'Add New Page';
	}
}