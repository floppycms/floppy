<?php

namespace Core\Libs\Auth;

use Core\Helpers\CookieHelper;

/**
 * Содержит методы авторизации
 */
class Auth implements AuthInterface
{
    protected $authorized = false;
    protected $user;

    /**
     * Статус авторизации
     *
     * @return bool
     */
    public function authorized()
    {
        return $this->authorized;
    }

    /**
     * Авторизованный пользователь
     *
     * @return string|null
     */
    public function user()
    {
        return CookieHelper::get('auth_user');
    }

    /**
     * Авторизация
     *
     * @param [type] $user
     * @return void
     */
    public function authorize($user)
    {
        CookieHelper::set('auth_authorized', true);
        CookieHelper::set('auth_user', $user);

        $this->authorized = true;
        $this->user = $user;
    }

    /**
     * Выход из системы
     *
     * @return void
     */
    public function unAuthorize()
    {
        CookieHelper::delete('auth_authorized');
        CookieHelper::delete('auth_user');

        $this->authorized = false;
        $this->user = null;
    }

    /**
     * Генерация случаной 'соли'
     *
     * @return string 
     */
    public function salt()
    {
        return (string) rand(1000000, 99999999);
    }

    /**
     * Генерация хэша пароля
     *
     * @param string $password
     * @param string $salt
     * @return string
     */
    public function encryptPassword($password, $salt = '')
    {
        return hash('sha256', $password, $salt);
    }
}