<?php

class Cart_Observer_Subject extends App_Subject_Abstract
{	
	public function renderForm( $formKey, Zend_View $view)
	{
		$this->notify(__FUNCTION__, $formKey, $view);
	}
	
	public function redirectToForm( $formKey, Zend_View $view, array $data)
	{
		$this->notify(__FUNCTION__, $view, $data);
	}
	
	public function redirectToURL( $currentFormKey, $returnFormKey, array $data, $method = 'POST')
	{
		$this->notify(__FUNCTION__, $currentFormKey, $returnFormKey, $data, $method);
	}
	
	public function redirectFromURL( $returnFormKey, array $data)
	{
		$this->notify(__FUNCTION__, $returnFormKey, $data);
	}
	
	public function addToCart(array $item_data)
	{
		$this->notify(__FUNCTION__, $item_data);
	}
	
	public function onSubmitForm($formKey, array $input)
	{
		$this->notify(__FUNCTION__, $formKey, $input);
	}
}