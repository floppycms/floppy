<?php

namespace Admin\Models\Post;

use Core\Libs\Database\ActiveRecord;

class Post
{
    use ActiveRecord;

    /**
     * Таблица, в которой хранятся записи сущности
     *
     * @var string
     */
    protected $tableName = 'post';

    /**
     * Идетификатор записи
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