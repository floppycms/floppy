<?php

namespace Core\DI;

/**
 * Класс реализует методы по добавлению и получению зависимостей приложения.
 */
class DI
{
    /**
     * Хранилище всех зависимостей приложения
     *
     * @var array
     */
    private $container = [];

    /**
     * Добавление зависимости в контейнер
     *
     * @param string $key Ключ (имя) зависимости
     * @param string $value Объект зависимости
     * @return $this
     */
    public function set($key, $value)
    {
        $this->container[$key] = $value;

        return $this;
    }

    /**
     * Получение зависимости по ключу
     *
     * @param string $key Ключ (имя) зависимости
     * @return string|null Объект зависимости или null, если отсутствует
     */
    public function get($key)
    {
        return $this->has($key) ? $this->container[$key] : null;
    }

    /**
     * Проверка существования зависимости с заданным ключем
     *
     * @param string $key Ключ (имя) зависимости
     * @return boolean true - если зависимость с заданным ключем существует и
     * false - в противном случае
     */
    public function has($key)
    {
        return isset($this->container[$key]);
    }

    public function push($key, $element = [])
    {
        if(!$this->has($key)){
            $this->set($key, []);
        }

        if(!empty($element)){
            $this->container[$key][$element['key']] = $element['value'];
        }
    }
}