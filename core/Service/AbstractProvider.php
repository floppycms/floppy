<?php

namespace Core\Service;

/**
 * Родительский класс для всех классов-сервисов приложения
 */
abstract class AbstractProvider
{
    /**
     * Зависимости приложения
     *
     * @var \Core\DI\DI
     */
    protected $di;

    /**
     * Конструктор класса
     *
     * @param \Core\DI\Di $di 
     */
    public function __construct(\Core\DI\Di $di)
    {
        $this->di = $di;
    }

    /**
     * Абстрактный метод, предназначенный для инициализации сервиса в контейнер зависимостей
     *
     * @return void
     */
    abstract function init();
}