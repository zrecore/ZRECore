<?php

class Admin_QuickOrder extends Zend_View_Helper_Abstract
{
	public function quickOrder()
	{
		$view = $this->view;
		$t = $view->translate;
		
		$script = "
jQuery(document).ready(function ($) {
	var autoCompOptions = {
		minLength: 0,
		source: '/admin/catalog/search.json',
		select: function (ev, ui) {
			return true;
		}
	};
	var lastInsertId = 0;
	var lastCouponInsertId = -1;
	
	var frmQuickForm = $('#frmQuickForm');
	var btnsQuickForm = frmQuickForm.find('.ribbon-field button, .ribbon-field input');
	frmQuickForm.validate();
	frmQuickForm.submit(function (ev) {
		
		ev.preventDefault();
		alert('blee');
		// @todo Submit via JSON
	});
	btnsQuickForm.each(function (i, button) {
		var btn = $(button);
		var opt = {};

		if (btn.hasClass('add-item-field')) {
			opt = {text: false, icons: {primary: 'ui-icon-plus'}};
			btn.click(function (ev) {
				lastInsertId++;
				
				frmQuickForm.find('.order-items').append(
					'<li><label>" . $t->_('SKU') . "</label><input id=\"order_item_search' + lastInsertId + '\" type=\"text\" class=\"order-item-search\" value=\"\" /><a class=\"order-item-view\" href=\"#\">" . $t->_('View') . "</a><a href=\"#\" class=\"order-item-remove\">" . $t->_('Remove') . "</a><span class=\"order-item-price\"></span><div class=\"ui-helper-hidden order-item-info\"></div></li>'
				);
				
				frmQuickForm.find('.order-items').last().find('.order-item-search').autocomplete( autoCompOptions );
			});
		}
		if (btn.hasClass('add-coupon-field')) {
			opt = {text: false, icons: {primary: 'ui-icon-plus'}};
			btn.click(function (ev) {
				lastInsertId++;
				
				frmQuickForm.find('.order-coupons').append(
					'<li><label>" . $t->_('Coupon') . "</label><input id=\"order_coupon_search' + lastInsertId + '\" type=\"text\" class=\"order-coupon-search\" value=\"\" /><a href=\"#\" class=\"order-item-remove\">" . $t->_('Remove') . "</a><span class=\"order-coupon-price\"></span><div class=\"ui-helper-hidden order-item-info\"></div></li>'
				);
				
				//frmQuickForm.find('.order-coupons').last().find('.order-coupon-search').autocomplete( autoCompOptions );
			});
		}
		if (btn.hasClass('submit-field')) opt = {text: false, icons: {primary: 'ui-icon-check'}};
		if (btn.hasClass('reset-field')) opt = {text: false, icons: {primary: 'ui-icon-cancel'}};

		btn.button(opt);
	});
	frmQuickForm.find('.order-item-search').each(function (i, obj) {
		$('#' + $(obj).attr('id')).autocomplete( autoCompOptions );
	});
});
";
		$style = "
#frmQuickForm .list-item label {margin: 0.2em; font-weight: normal; font-style: italic;}
#frmQuickForm .list-item input, #frmQuickForm .list-item textarea {border: solid 1px #aaa; margin: 0.4em; min-width: 129px;}
#frmQuickForm .list-item a {margin: 0.2em 0.4em;}

#frmQuickForm .ribbon-field {display: inline-block;}
#frmQuickForm .ribbon-field button, #frmQuickForm .ribbon-field input {min-width: 24px; height: 24px;}

#frmQuickForm .order-customer-details li {text-align: right;}
#frmQuickForm .order-customer-details li label {float: left; font-weight: bold;}
#frmQuickForm .order-customer-details .order-notes { width: 220px; min-height: 8em; }

.ui-autocomplete-loading { background: white url('/images/ajax-loader.gif') right center no-repeat; }
";
		$view->headScript()->appendScript($script);
		$view->headStyle()->appendStyle($style);

		// Generate the HTML
		$output = 
		'<div class="widget-box-item">' . 
			'<div class="widget-box-item-header">' . $t->_('Quick Order') . '</div>' . 
			'<div class="widget-box-item-content" style="display: block;">' .
				'<form id="frmQuickForm">' . 
					'<h3></h3>' .
					'<ul class="list-item order-customer-details">' . 
						'<li><label>' . $t->_('First Name') . '</label><input type="text" class="order-first-name required" value="" /></li>' .
						'<li><label>' . $t->_('Last Name') . '</label><input type="text" class="order-last-name required" value="" /></li>' .
						'<li><label>' . $t->_('Company') . '</label><input type="text" class="order-company" value="" /></li>' .
						'<li><label>' . $t->_('E-Mail') . '</label><input type="text" class="order-email required" value="" /></li>' .
						'<li><label>' . $t->_('Street') . '</label><input type="text" class="order-address1 required" value="" /></li>' .
						'<li><label>' . $t->_('Suite, Apt, or PO Box') . '</label><input type="text" class="order-address2" value="" /></li>' .
						'<li><label>' . $t->_('City') . '</label><input type="text" class="order-address2" value="" /></li>' .
						'<li><label>' . $t->_('Phone') . '</label><input type="text" class="order-phone1 required" value="" /></li>' .
						'<li><label>' . $t->_('Phone Alt') . '</label><input type="text" class="order-phone2" value="" /></li>' .
						'<li><label>' . $t->_('Notes') . '</label><textarea class="order-notes"></textarea></li>' .
					'</ul>' . 
					'<br /><h3>Items</h3>' . 
					'<ul class="list-item order-items">' . 
						'<li><label>' . $t->_('SKU') . '</label><input id="order_item_search0" type="text" class="order-item-search" value="" /><a class="order-item-view" href="#">' . $t->_('View') . '</a><a href="#" class="order-item-remove">' . $t->_('Remove') . '</a><span class="order-item-price"></span><div class="ui-helper-hidden order-item-info"></div></li>' . 
					'</ul>' . 
					'<div class="ribbon-field">' . 
						'<button class="add-item-field" type="button" alt="' . $t->_('Add Item') . '"></button>' . 
					'</div>' .
					'<h3>Coupons</h3>' .
					'<ul class="list-item order-coupons">' . 
					'</ul>' .
					'<div class="ribbon-field">' . 
						'<button class="add-coupon-field" type="button" alt="' . $t->_('Add Coupon') . '"></button>' . 
					'</div>' .
				'</form>' . 
			'</div>' . 
		'</div>';
		
		return $output;
	}
}