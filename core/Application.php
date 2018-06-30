<?php

namespace Core;

class Application
{

    /**
     * Объект класса DI, контейнер зависимостей приложения
     *
     * @var \Core\DI\DI $di
     */
    private $di;

    /**
     * Конструктор
     *
     * @param \Core\DI\DI $di
     */
    public function __construct(\Core\DI\DI $di)
    {
        $this->di = $di;
    }

    /**
     * Запуск приложения
     *
     * @return void
     */
    public function run()
    {

    }
}