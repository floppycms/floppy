<?php

namespace Core\Service\Router;

use \Core\Service\AbstractProvider;
use \Core\Libs\Router\Router;

class Provider extends AbstractProvider
{
    /**
     * Имя сервиса. Является ключом сервис в котейнере зависимостей
     *
     * @var string
     */
    public $serviceName = 'router';

    /**
     * Регистрирует сервис Router в контейнере зависимостей
     *
     * @return void
     */
    public function init()
    {
        $router = new Router('http://framework.dev/');

        $this->di->set($this->serviceName, $router);
    }
}