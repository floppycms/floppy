<?php

namespace Core\Libs\Router;

class Router
{
    private $routes = [];
    private $dispatcher;
    private $host;

    /**
     * Конструктор класса Router
     *
     * @param string $host Базовый URL приложения
     */
    public function __construct($host)
    {
        $this->host = $host;
    }

    /**
     * Добавление нового роута в массив
     *
     * @param string $key Ключ, по которому будет доступен роут
     * @param string $pattern Запрос, с которым ассоциирован роут
     * @param string $controller Контроллер и действие
     * @param string $method Метод, которым отправлен запрос
     * @return void
     */
    public function add($key, $pattern, $controller, $method = 'GET')
    {
        $this->routes[$key] = [
            'pattern' => $pattern,
            'controller' => $controller,
            'method' => $method
        ];
    }

    /**
     * Получение объекта DispatchRoute для заданного Uri
     *
     * @param string $method
     * @param string $uri
     * @return DispatchRoute
     */
    public function dispatch($method, $uri)
    {
        return $this->getDispatcher()->dispatch($method, $uri);
    }

    public function getDispatcher()
    {
        if($this->dispatcher === null){
            $this->dispatcher = new URLDispatcher();

            foreach($this->routes as $route){
                $this->dispatcher->register($route['method'], $route['pattern'], $route['controller']);
            }
        }

        return $this->dispatcher;
    }
}