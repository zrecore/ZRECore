<?php

class Admin_UsersController extends Controller_Module_Admin
{
	public function init() 
	{
		parent::init();
		$this->view->title = 'Users';
		
	}

	public function allUsersAction()
	{
		$this->view->title = 'All Users';
	}
	
	public function addNewAction()
	{
		$this->view->title = 'Add a New User';
	}
	
	public function rolesAction()
	{
		$this->view->title = 'Roles';
	}
}