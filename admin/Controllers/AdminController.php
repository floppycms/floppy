<?php

namespace Admin\Controllers;

use Core\Controller;
use Core\Libs\Auth\Auth;

/**
 * Базовый класс контроллера для админки.
 * 
 * Неавторизованные пользователи перенаправляются на страницу авторизации
 */
class AdminController extends Controller
{

    protected $auth;

    public $data = [];

    public function __construct(\Core\DI\DI $di)
    {
        parent::__construct($di);

        $this->load->language('admin/menu');

        $this->auth = new Auth();

        $this->data['APP_NAME'] = 'FlexyCMS';

        $this->checkAuthorization();

    }

    public function checkAuthorization()
    {
        if($this->auth->user() !== null){
            $this->auth->authorize($this->auth->user());
        }

        if(!$this->auth->authorized()){
            //redirect
            header('Location: /admin/login/');
            exit();
        }
    }

    public function logout()
    {
        $this->auth->unAuthorize();
        header('Location: /admin/login/');
    }
}