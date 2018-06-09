<?php

	spl_autoload_register(function($classname){
		$full_class = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . $classname . '.php';
		if(file_exists($full_class)){
			require_once $full_class;
		}
	});