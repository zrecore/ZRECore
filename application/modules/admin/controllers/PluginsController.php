<?php

class Admin_PluginsController extends Controller_Module_Admin
{
	public function init() 
	{
		parent::init();
		$this->view->title = 'Plug-ins';
		
	}

	public function installedAction()
	{
		$this->view->title = 'Installed Plug-ins';
	}
	
	public function addNewAction()
	{
		$this->view->title = 'Add a New Plug-in';
	}
}