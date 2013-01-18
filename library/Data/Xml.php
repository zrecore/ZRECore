<?php

class Data_Xml {

	public static function toXml(&$doc, &$rootElement, $key, $value) {
		$statusElement = $doc->createElement($key);

		if (is_array($value)) {
			foreach($value as $k => $v)
			{
				if (is_numeric($k)) {
					self::toXml($doc, $statusElement, $v, null);
				} else {
					self::toXml($doc, $statusElement, $k, $v);
				}
			}
		} else {
			$statusElement->appendChild($doc->createTextNode($value));
		}
		$rootElement->appendChild($statusElement);
	}

}