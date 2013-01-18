<?php

class Cms_Page
{
	public static function bySlug($text, $include_non_published = 0)
	{
		// Clean up and get a valid slug string.
		$slug = I18n_Text::createSlug( $text );
		
		// Find it, or throw exception.
		$page = new Application_Model_Page;
		$columns = array(
			'page_slug' => $slug
		);
		
		if (!$include_non_published) {
			$columns['page_is_published'] = 1;
		}
		
		$options = array(
			'order' => 'date_created DESC'
		);
		$data = $page->listAll($columns, $options);
		
		return $data;
	}
}