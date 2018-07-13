<?php

namespace Admin\Controllers;

class DashboardController extends AdminController
{
    public function index()
    {
        $this->load->model('User');

        $users = $this->model->user->getUsers();

        $this->view->render('dashboard');
    }
}