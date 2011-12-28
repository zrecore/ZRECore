<?php

class Admin_PostsController extends Controller_Module_Admin
{
	public function init() 
	{
		parent::init();
		$this->view->title = 'Posts';
		
	}

	public function allPostsAction()
	{
		$this->view->title = 'All Posts';
	}
	
	public function addNewAction()
	{
		$this->view->title = 'Add New Post';
	}
}