<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

/**
 * Точка входа приложения
 */

/**
 * Корневая директория приложения
 * @var string 
 */
define('ROOT_DIR', __DIR__); 

/**
 * Текущее окружение
 */
define('ENV', 'Cms');

 require_once 'core/bootstrap.php';