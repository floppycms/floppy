<?php

/**
* 
*/
class ErrorController extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->view->render('error/index', 'Page Not Found');
	}
}