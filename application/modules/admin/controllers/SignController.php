<?php

class Admin_SignController extends Controller_Module_Admin
{
	public function inAction()
	{
		$request = $this->getRequest();
		
		// Form submitted?
		$is_submitted = $request->getParam('submit');
		if (isset($is_submitted)) {
			
		}
	}
	
	public function outAction()
	{
		
	}
}