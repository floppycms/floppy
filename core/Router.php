<?php

/**
* Разбирает строку запроса на параметры, создает контроллер и вызывает действие контроллера
*/
class Router 
{
	
	function __construct()
	{
		$url = $_SERVER['REQUEST_URI'];
		$url = rtrim($url, '/');
		$url = explode('/', $url);

		if(!isset($url[1])){
			$controller = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . 'IndexController.php';
			$controller_class = 'IndexController';
			$action = 'index';
		} else {
			$controller = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . ucfirst($url[1]) . 'Controller.php';

			if(!file_exists($controller)){
				$controller = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . 'ErrorController.php';
				$controller_class = 'ErrorController';
				$action = 'index';
			} else {
				$controller_class = ucfirst($url[1]) . 'Controller';
				$action = isset($url[2]) ? $url[2] : 'index';
			}

			
		}

		require $controller;
		
		$c = new $controller_class();

		if(isset($url[3])){
			$c->$action($url[3]);
		} else {
			$c->$action();
		}

		
	}
}