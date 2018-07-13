<?php

namespace Admin\Models\User;

use Core\Libs\Database\ActiveRecord;

class User
{
    use ActiveRecord;

    /**
     * Таблица, в которой хранятся записи сущности
     *
     * @var string
     */
    protected $tableName = 'user';

    /**
     * Идетификатор пользователя
     *
     * @var int
     */
    public $id;

    /**
     * Email пользователя
     *
     * @var string
     */
    public $email;

    /**
     * Пароль пользователя
     *
     * @var string
     */
    public $password;

    /**
     * Логин пользователя
     *
     * @var string
     */
    public $login;

    /**
     * Роль пользователя
     *
     * @var string
     */
    public $role;

    /**
     * Дата регистрации пользователя
     *
     * @var Date
     */
    public $reg_date;

    /**
     * Хэш куки пользователя
     *
     * @var string
     */
    public $hash;
}