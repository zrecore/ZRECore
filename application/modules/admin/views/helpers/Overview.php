<?php

class Admin_Overview extends Zend_View_Helper_Abstract
{
	public function overview()
	{
		$output = 
		'<div class="widget-box-item">' . 
			'<div class="widget-box-item-header">Overview</div>' . 
			'<div class="widget-box-item-content">This is some content. Hooray</div>' . 
		'</div>';
		
		return $output;
	}
}