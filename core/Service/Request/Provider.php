<?php

namespace Core\Service\Request;

use \Core\Service\AbstractProvider;
use \Core\Libs\Request\Request;

class Provider extends AbstractProvider
{
    /**
     * Имя сервиса. Является ключом сервис в котейнере зависимостей
     *
     * @var string
     */
    public $serviceName = 'request';

    /**
     * Регистрирует сервис Request в контейнере зависимостей
     *
     * @return void
     */
    public function init()
    {
        $request = new Request();

        $this->di->set($this->serviceName, $request);
    }
}