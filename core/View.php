<?php

/**
* Базовый класс представлений
*/
class View
{
	
	function __construct()
	{
		# code...
	}

	public function render($view, $args = '')
	{
		require $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $view . '.php';
	}
}