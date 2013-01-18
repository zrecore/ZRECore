<?php

class I18n_Text
{
	/**
	 * Convert text to UTF-8 encoding.
	 * @param string $text
	 * @return string The converted text.
	 */
	static function toUTF8($text)
	{
		return iconv('', 'UTF-8//TRANSLIT//IGNORE', $text);
	}
	/**
	 * Convert text to UTF-16 encoding
	 * @param string $text
	 * @return string The converted text.
	 */
	static function toUTF16($text)
	{
		return iconv('', 'UTF-16//TRANSLIT//IGNORE', $text);
	}
	/**
	 * Convert text to ASCII encoding.
	 * @param string $text
	 * @return string The converted text.
	 */
	static function toASCII($text)
	{
		return iconv('', 'ASCII//TRANSLIT//IGNORE', $text);
	}
	/**
	 *
	 * @param string $text
	 * @return string The slug text.
	 */
	static function createSlug($text)
	{
		$pattern = array('/[ \-]+/', '/[^a-z0-9\-]/i', '/\-+/');
		$replacement = array('-', '', '-');
		
		return self::regexReplace($pattern, $replacement, $text);
	}
	/**
	 * Character encoding-safe regex method. Uses preg_replace()
	 * @param string $pattern
	 * @param string $replacement
	 * @param string $subject
	 * @param string $outputEncoding
	 * @return string The modified string.
	 */
	static function regexReplace($pattern, $replacement, $subject, $outputEncoding = 'UTF-8') {
		$subject = self::toASCII($subject);
		$text = preg_replace($pattern, $replacement, $subject);
		
		switch ($outputEncoding)
		{
			case 'ASCII':
				$text = self::toASCII($text);
				break;
			case 'UTF-16':
				$text = self::toUTF16($text);
				break;
			case 'UTF-8': // Break statement omitted on purpose.
			default:
				$text = self::toUTF8($text);
		}
		return $text;
	}
}