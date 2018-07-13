<?php

namespace Core\Service\Database;

use \Core\Service\AbstractProvider;
use \Core\Libs\Database\Connection;

class Provider extends AbstractProvider
{
    /**
     * Имя сервиса. Является ключом сервис в котейнере зависимостей
     *
     * @var string
     */
    public $serviceName = 'db';

    /**
     * Регистрирует сервис Connection в контейнере зависимостей
     *
     * @return void
     */
    public function init()
    {
        $db = new Connection();

        $this->di->set($this->serviceName, $db);
    }
}