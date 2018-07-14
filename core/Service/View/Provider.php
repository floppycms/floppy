<?php

namespace Core\Service\View;

use \Core\Service\AbstractProvider;
use \Core\Libs\Template\View;

class Provider extends AbstractProvider
{
    /**
     * Имя сервиса. Является ключом сервис в котейнере зависимостей
     *
     * @var string
     */
    public $serviceName = 'view';

    /**
     * Регистрирует сервис View в контейнере зависимостей
     *
     * @return void
     */
    public function init()
    {
        $view = new View($this->di);

        $this->di->set($this->serviceName, $view);
    }
}