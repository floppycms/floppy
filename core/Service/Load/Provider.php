<?php

namespace Core\Service\Load;

use \Core\Service\AbstractProvider;
use \Core\Load;

class Provider extends AbstractProvider
{
    /**
     * Имя сервиса. Является ключом сервис в котейнере зависимостей
     *
     * @var string
     */
    public $serviceName = 'load';

    /**
     * Регистрирует сервис Load в контейнере зависимостей
     *
     * @return void
     */
    public function init()
    {
        $load = new Load($this->di);

        $this->di->set($this->serviceName, $load);
    }
}