<?php

namespace Core\Libs\Router;

/**
 * Хранит имя контроллера и массив параметров.
 * 
 * Класс используется в URLDispatcher
 */
class DispatchRoute
{
    private $controller;
    private $params;

    /**
     * Конструктор DispatchRoute
     *
     * @param string $controller
     * @param array $params
     */
    public function __construct($controller, $params = [])
    {
        $this->controller = $controller;
        $this->params = $params;
    }

    /**
     * Получение имени контроллера
     * @return string
     */ 
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Получение параметров
     * @return array
     */ 
    public function getParams()
    {
        return $this->params;
    }
}