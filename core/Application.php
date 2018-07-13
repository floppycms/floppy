<?php

namespace Core;

use Core\Helpers\RequestHelper;
use Core\Libs\Router\DispatchRoute;

class Application
{

    /**
     * Объект класса DI, контейнер зависимостей приложения
     *
     * @var \Core\DI\DI $di
     */
    private $di;

    public $router;

    /**
     * Конструктор
     *
     * @param \Core\DI\DI $di
     */
    public function __construct(\Core\DI\DI $di)
    {
        $this->di = $di;
        $this->router = $this->di->get('router');
    }

    /**
     * Запуск приложения
     *
     * @return void
     */
    public function run()
    {
        //подключение роутов
        require_once __DIR__ . '/../'. strtolower(ENV) .'/routes.php';

        $routerDispatch = $this->router->dispatch(RequestHelper::getMethod(), RequestHelper::getPathUrl());
        
        if($routerDispatch == null){
            $routerDispatch = new DispatchRoute('ErrorController:notFound');
        }

        list($class, $action) = explode(':', $routerDispatch->getController(), 2);

        $controller = '\\'. ENV .'\\Controllers\\' . $class;

        call_user_func_array([new $controller($this->di), $action], $routerDispatch->getParams());
    }
}