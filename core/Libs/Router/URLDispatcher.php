<?php

namespace Core\Libs\Router;

/**
 * Разбирает строку запроса на составляющие (контроллер действие параметры)
 */
class URLDispatcher
{
    private $methods = [
        'GET',
        'POST'
    ];

    private $routes = [
        'GET' => [],
        'POST' => []
    ];

    private $patterns = [
        'int' => '[0-9]+',
        'str' => '[a-zA-Z\.\-_%]+',
        'any' => '[a-zA-Z0-9\.\-_%]+'
    ];

    /**
     * Добавление нового шаблона в массив patterns
     *
     * @param string $key Имя шаблона
     * @param string $pattern Шаблон
     * @return void
     */
    public function addPattern($key, $pattern)
    {
        $this->patterns[$key] = $pattern;
    }

    /**
     * Регистрирует новый роут
     *
     * @param string $method
     * @param string $pattern
     * @param string $controller
     * @return void
     */
    public function register($method, $pattern, $controller)
    {
        $pattern = $this->convertPattern($pattern);
        $this->routes[strtoupper($method)][$pattern] = $controller;
    }

    private function convertPattern($pattern)
    {
        if(strpos($pattern, '(') === false){
            return $pattern;
        }

        return preg_replace_callback('#\((\w+):(\w+)\)#', [$this, 'replacePattern'], $pattern);
    }

    private function replacePattern($matches)
    {
        return '(?<' . $matches[1] .'>' . strtr($matches[2], $this->patterns) . ')';
    }

    private function processParam($params)
    {
        foreach($params as $key => $value){
            if(is_int($key)){
                unset($params[$key]);
            }
        }
        return $params;
    }

    /**
     * 
     *
     * @param string $method
     * @param string $uri
     * @return DispatchRoute
     */
    public function dispatch($method, $uri)
    {
        $routes = $this->routes[strtoupper($method)];

        if(array_key_exists($uri, $routes)){
            return new DispatchRoute($routes[$uri]);
        }

        return $this->doDispatch($method, $uri);
    }

    private function doDispatch($method, $uri)
    {
        foreach($this->routes[strtoupper($method)] as $route => $controller){
            $pattern = '#^' . $route .'$#s';

            if(preg_match($pattern, $uri, $params)){
                return new DispatchRoute($controller, $this->processParam($params));
            }
        }
    }
}