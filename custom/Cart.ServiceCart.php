<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cart
 *
 * @author aalbino
 */
class Custom_Cart_ServiceCart extends App_Observer_Abstract
{
	public function addToCart(array $items)
	{
		echo "called addToCart( items )<br />\n<pre>" . print_r($items, 1) . "</pre><br />\n";
	}
}