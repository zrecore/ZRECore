<?php

class Default_IndexController extends Zend_Controller_Action {

	public function init() {
		/* Initialize action controller here */
		$request = $this->getRequest();
		
		$module = $request->getModuleName();
		$controller = $request->getControllerName();
		$action = $request->getActionName();
		
		$js = $this->getInvokeArg('javascriptFramework');
		$css = $this->getInvokeArg('stylesheetReset');
		
		$relative_filename = '/' . $module . '/' . $controller . '/' . $action;
		
		$this->view->headScript()->appendFile( $js );
		$this->view->headLink()->appendStylesheet( $css );

		$js_file = '/script' . $relative_filename . '.js';
		$css_file = '/style' . $relative_filename . '.css';
		
		if (file_exists(APPLICATION_PATH . '/../public' . $js_file))
			$this->view->headScript()->appendFile( $js_file );
		
		if (file_exists(APPLICATION_PATH . '/../public' . $css_file))
			$this->view->headLink()->appendStylesheet( $css_file );
	}

	public function indexAction() {
		// Page slugs should route here.
		$rq = $this->getRequest();
		$page_slug = $rq->getParam('page_slug');
		
		if ( !empty($page_slug) ) {
			$pages = Cms_Page::bySlug($page_slug, 1);
			
			if (!empty($pages) && $pages->count() > 0) {
				$this->view->pages = $pages;
				$this->view->headTitle($pages->current()->page_title);
			} else {
				// Send a 404
				throw new Zend_Controller_Router_Exception('Page not found', 404);
			}
		} else {
			// Load the default page.
		}
	}

	public function postAction() {
		$rq = $this->getRequest();
		
		$yr = $rq->getParam('year');
		$mo = $rq->getParam('month');
		$day = $rq->getParam('day');
		
		$slug = $rq->getParam('post_slug');
		
		echo "<pre>";
		print_r($rq->getParams());
		echo "</pre>";
	}
}

