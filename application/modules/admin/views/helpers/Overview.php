<?php

class Admin_Overview extends Zend_View_Helper_Abstract
{
	public function onStatsRender()
	{
		
	}
	
	public function onInfoRender()
	{
		$view = $this->view;
		$t = $view->translate;
		$auth = Zend_Auth::getInstance();
		$user = $auth->getIdentity();
		
		if ($user instanceOf Auth\User)
		{
			$html = $t->_('Welcome') . ', ' . $user->getFirstName() . ' ' . $user->getLastName() . '.';
		} else {
			$html = $t->_('Welcome') . ', ' . $t->_('User') . '.';
		}
		return $html;
	}
	public function overview()
	{
		$view = $this->view;
		$t = $view->translate;
		
		// Make sure we have loaded the necessary files first.
		$view->headScript()->appendFile( '/script/Highcharts-2.1.9/highcharts.src.js' );
		
		// Generate the HTML
		$output = 
		'<div class="widget-box-item">' . 
			'<div class="widget-box-item-header">Overview</div>' . 
			'<div class="widget-box-item-content" style="display: block;">' . 
				'<ul class="list-item" style="width: 48%; display: inline; margin: 0; padding: 0; float: left;">' . 
					'<li><span class="list-item-label">' . $t->_('Orders Complete') . ':</span><span class="list-item-content">0</span></li>' . 
					'<li><span class="list-item-label">' . $t->_('Items Sold') . ':</span><span class="list-item-content">0</span></li>' . 
					'<li><span class="list-item-label">' . $t->_('Service Requests') . ':</span><span class="list-item-content">0</span></li>' . 
					'<li><span class="list-item-label">' . $t->_('New Subsciptions') . ':</span><span class="list-item-content">0</span></li>' .
				'</ul>' .
				'<ul class="list-item" style="width: 48%; display: inline; margin: 0; padding: 0; float: right;">' . 
					'<li><span class="list-item-label">' . $t->_('Pages') . ':</span><span class="list-item-content">0</span></li>' .
					'<li><span class="list-item-label">' . $t->_('Posts') . ':</span><span class="list-item-content">0</span></li>' .
					'<li><span class="list-item-label">' . $t->_('Comments') . ':</span><span class="list-item-content">0</span></li>' .
					'<li><span class="list-item-label">&nbsp;</span><span class="list-item-content">&nbsp;</span></li>' .
				'</ul>' . $this->onStatsRender() .
				'<div style="margin: 0.4em 0; float: left; font-size: 0.8em; text-align: left;">' . $this->onInfoRender() . '</div>' .
			'</div>' . 
		'</div>';
		
		return $output;
	}
}