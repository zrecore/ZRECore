<?php

class Admin_Overview extends Zend_View_Helper_Abstract
{
	public function onStatsRender()
	{
		/**
		 * @todo Load and call the specified PHP files for this method.
		 */
	}
	
	public function onInfoRender()
	{
		/**
		 * @todo Load and call the specified PHP files for this method.
		 */
	}
	public function overview()
	{
		$t = $this->view->translate;

		$output = 
		'<div class="widget-box-item">' . 
			'<div class="widget-box-item-header">Overview</div>' . 
			'<div class="widget-box-item-content" style="display: block;">' . 
				'<ul class="list-item" style="width: 48%; display: inline; margin: 0; padding: 0; float: left;">' . 
					'<li><span class="list-item-label">' . $t->_('Orders') . ':</span><span class="list-item-content">0</span></li>' . 
					'<li><span class="list-item-label">' . $t->_('Pages') . ':</span><span class="list-item-content">0</span></li>' .
					'<li><span class="list-item-label">' . $t->_('Comments') . ':</span><span class="list-item-content">0</span></li>' .
					'<li><span class="list-item-label">' . $t->_('Plug-in(s)') . ':</span><span class="list-item-content">0</span></li>' .
				'</ul>' .
				'<ul class="list-item" style="width: 48%; display: inline; margin: 0; padding: 0; float: right;">' . 
					'<li><a href="#">' . $t->_('Create') . '</a>, <a href="#">' . $t->_('View All') . '</a></li>' . 
					'<li><a href="#">' . $t->_('Create') . '</a>, <a href="#">' . $t->_('View All') . '</a></li>' . 
					'<li><a href="" class="dashboard-tooltip" title="Stats|0 Approved, 0 Pending, 0 Spam">Stats</a>, ' . 
						'<a href="#">View All</a></li>' .
					'<li><a href="#">' . $t->_('Install') . '</a>, <a href="#">' . $t->_('View All') . '</a></li>' . 
				'</ul>' . $this->onStatsRender() .
				'<div style="margin-top: 0.4em; float: left; font-size: 0.8em;">Howdy. This is text.</div>' . $this->onInfoRender() .
			'</div>' . 
		'</div>';
		
		return $output;
	}
}