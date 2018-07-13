<?php

namespace Core\Service\Config;

use \Core\Service\AbstractProvider;
use \Core\Libs\Config\Config;

class Provider extends AbstractProvider
{
    /**
     * Имя сервиса. Является ключом сервис в котейнере зависимостей
     *
     * @var string
     */
    public $serviceName = 'config';

    /**
     * Регистрирует сервис Config в контейнере зависимостей
     *
     * @return void
     */
    public function init()
    {
        $config['db'] = Config::file('db');

        $this->di->set($this->serviceName, $config);
    }
}