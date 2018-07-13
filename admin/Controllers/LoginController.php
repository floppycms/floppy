<?php

namespace Admin\Controllers;

use Core\Controller;
use Core\Libs\Auth\Auth;
use Core\Libs\Database\QueryBuilder;

class LoginController extends Controller
{
    protected $auth;

    public function __construct(\Core\DI\DI $di)
    {
        parent::__construct($di);

        $this->auth = new Auth();

        if($this->auth->user() !== null){
            $this->auth->authorize($this->auth->user());
        }

        if($this->auth->authorized()){
            header('Location: /admin/');
            exit;
        }
    }

    public function form()
    {
        $this->view->render('login');
    }

    public function authAdmin()
    {
        $params = $this->request->post;

        $queryBuilder = new QueryBuilder();

        $sql = $queryBuilder
        ->select()
        ->from('user')
        ->where('email', $params['email'])
        ->where('password', md5($params['password']))
        ->limit(1)
        ->sql();
        
        $query = $this->db->query($sql, $queryBuilder->values);

        if(!empty($query)){
            $user = $query[0];

            if($user['role'] === 'admin'){
                $hash = md5($user['email'] . $user['password']) . $this->auth->salt();

                $sql = $queryBuilder
                ->update('user')
                ->set(['hash' => $hash])
                ->where('id', $user['id'])
                ->limit(1)
                ->sql();

                $this->db->execute($sql, $queryBuilder->values);

                $this->auth->authorize($hash);

                header('Location: /admin/login/');
                exit;
            }
        }
        
        echo 'Неверный Email или пароль!';
    }
}