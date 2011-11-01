<?php

class Admin_SignController extends Zend_Controller_Abstract
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