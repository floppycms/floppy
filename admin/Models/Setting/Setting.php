<?php

namespace Admin\Models\Setting;

use Core\Libs\Database\ActiveRecord;

class Setting
{
    use ActiveRecord;

    /**
     * Таблица, в которой хранятся записи сущности
     *
     * @var string
     */
    protected $tableName = 'setting';

    public $id;

    public $name;

    public $key_field;

    public $value;

}