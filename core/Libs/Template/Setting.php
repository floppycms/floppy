<?php

namespace Core\Libs\Template;

use \Admin\Models\Setting\SettingRepository;
use Core\DI\DI;

/**
 * Предоставляет доступ к глобальным настройкам сайта
 */
class Setting
{
    protected static $di;

    protected static $settingRepository;

    public function __construct($di)
    {
        self::$di = $di;
        self::$settingRepository = new SettingRepository(self::$di);
    }

    public static function get($keyField)
    {
        return self::$settingRepository->getSettingValue($keyField);
    }
}