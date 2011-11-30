<?php

class Admin_AppearanceController extends Controller_Module_Admin
{
	public function init() 
	{
		parent::init();
		$this->view->title = 'Appearance';
		
	}

	public function themesAction()
	{
		$this->view->title = 'Themes';
	}
	
	public function widgetsAction()
	{
		$this->view->title = 'Widgets';
	}
	
	public function menusAction()
	{
		$this->view->title = 'Menus';
	}
}