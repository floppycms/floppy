<?php

namespace Core\Libs\Template;

use \Core\Libs\Config\Config;

class Asset
{
    const JS_EXT = '.js';
    const CSS_EXT = '.css';

    const JS_MASK = '<script src="%s"></script>';
    const CSS_MASK = '<link href="%s" rel="stylesheet">';

    public static $container = [];

    /**
     * Добавление ссылки на файл css в контейнер
     *
     * @param string $link Название файла (без расширения)
     * @return void
     */
    public static function css($link)
    {
        $file = $link . self::CSS_EXT;
        $file = Theme::getUrl() . $file;

        if(is_file($_SERVER['DOCUMENT_ROOT'] . $file)){
            self::$container['css'][] = [
                'file' => $file
            ];
        }
    }

    /**
     * Добавление ссылки на файл js в контейнер
     *
     * @param string $link Название файла (без расширения)
     * @return void
     */
    public static function js($link)
    {
        $file = $link . self::JS_EXT;
        $file = Theme::getUrl() . $file;

        if(is_file($_SERVER['DOCUMENT_ROOT'] . $file)){
            self::$container['js'][] = [
                'file' => $file
            ];
        }
    }

    /**
     * Подключает все зарегистрированные скрипты или стили
     *
     * @param string $ext Расширение типа файлов, которые необходимо подключить
     * @return void
     */
    public static function render($ext)
    {
        $listFiles = isset(static::$container[$ext]) ? static::$container[$ext] : false;

        if($listFiles){
            $renderMethod = 'render' . ucfirst($ext);
            static::{$renderMethod}($listFiles);
        }
    }

    /**
     * Подключение стилей на странице
     *
     * @param array $list
     * @return void
     */
    private static function renderCss($list)
    {
        foreach($list as $elem){
            echo sprintf(self::CSS_MASK, $elem['file']);
        }
    }

    /**
     * Подключение JS скриптов на странице
     *
     * @param array $list
     * @return void
     */
    private static function renderJs($list)
    {
        foreach($list as $elem){
            echo sprintf(self::JS_MASK, $elem['file']);
        }
    }
}