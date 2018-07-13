<?php

namespace Cms\Controllers;

use \Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $this->view->render('index', ['app_name' => 'WebCMS']);
    }

    public function articles($id)
    {
        
    }
}