<?php

namespace Core\Helpers;

/**
 * Методы получения значений из $_SERVER[]
 */
class RequestHelper
{
    /**
     * Отправлен ли POST-запрос
     *
     * @return boolean
     */
    public static function isPost()
    {
        return ($_SERVER['REQUEST_METHOD'] === 'POST');
    }

    /**
     * Отправлен ли GET-запрос
     *
     * @return boolean
     */
    public static function isGet()
    {
        return ($_SERVER['REQUEST_METHOD'] === 'GET');
    }

    /**
     * Каким методом отправлен запрос
     *
     * @return string
     */
    public static function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Получение url без GET-параметров
     *
     * @return string
     */
    public static function getPathUrl()
    {
        $pathUrl = $_SERVER['REQUEST_URI'];

        if($pos = strpos($pathUrl, '?')){
            $pathUrl = substr($pathUrl, 0, $pos);
        }

        return $pathUrl;
    }
}