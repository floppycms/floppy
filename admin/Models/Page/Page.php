<?php

namespace Admin\Models\Page;

use Core\Libs\Database\ActiveRecord;

class Page
{
    use ActiveRecord;

    /**
     * Таблица, в которой хранятся записи сущности
     *
     * @var string
     */
    protected $tableName = 'page';

    /**
     * Идетификатор пользователя
     *
     * @var int
     */
    public $id;

    public $title;

    public $content;

    public $published_at;

    public $keywords;

    public $description;
}