<?php

namespace Core\Libs\Config;

class Config
{
    /**
     * Получение настройки из файла настроек
     *
     * @param string $key Имя настройки (ключ массива)
     * @param string $group Имя файла настроек
     * @return mixed|null
     */
    public static function item($key, $group = 'items')
    {
        $items = static::file($group);

        return isset($items[$key]) ? $items[$key] : null;
    }

    /**
     * Загружает данные конфигурации и возвращает их в виде массива
     *
     * @param string $group Имя файла конфигурации
     * @return array|false Массив с данными конфигурации
     */
    public static function file($group)
    {
        $filePath = $_SERVER['DOCUMENT_ROOT'] . '/' . strtolower(ENV) . '/Config/' . $group . '.php';

        if(file_exists($filePath)){

            $items = require $filePath;

            if(is_array($items)){
                return $items;
            } else {
                throw new \Exception(
                    sprintf('Кофигурационные данные <strong>%s</strong> не являются массивом!', $filePath)
                );
            }

        } else {
            throw new \Exception(
                sprintf('Не найден файл конфигурации : <strong>%s</strong>', $filePath)
            );
        }

        return false;
    }
}