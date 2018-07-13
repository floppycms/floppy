<?php

namespace Core\Helpers;

/**
 * Методы для работы с куками
 */
class CookieHelper
{
    /**
     * Устанавливает куки
     *
     * @param string $key Имя куки
     * @param string $value Значение куки
     * @param integer $time Время жизни куки
     * @return void
     */
    public static function set($key, $value, $time = 31536000)
    {
        setcookie($key, $value, time() + $time, '/');
    }

    /**
     * Получение куки по ключю
     *
     * @param string $key Имя куки
     * @return mixed Значение куки
     */
    public static function get($key)
    {
        return isset($_COOKIE[$key]) ? $_COOKIE[$key] : null;
    }

    /**
     * Удаляет куки с заданным ключом
     *
     * @param string $key Имя куки
     * @return void
     */
    public static function delete($key)
    {
        if(isset($_COOKIE[$key])){
            self::set($key, '', -3600);
            unset($_COOKIE[$key]);
        }
    }
}