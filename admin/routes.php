<?php

//Роуты админки

$this->router->add('login', '/admin/login/', 'LoginController:form');  //форма входа
$this->router->add('auth', '/admin/login/', 'LoginController:authAdmin', 'POST');  //авторизация админа
$this->router->add('logout', '/admin/logout/', 'AdminController:logout');  //выход из системы

$this->router->add('dashboard', '/admin/', 'DashboardController:index');  //главная админки

//страницы
$this->router->add('page-list', '/admin/page/', 'PageController:list');  //список страниц сайта
$this->router->add('page-create', '/admin/page/create/', 'PageController:create');  //форма создания страницы
$this->router->add('page-add', '/admin/page/add/', 'PageController:add', 'POST');  //создание страницы

$this->router->add('page-edit', '/admin/page/edit/(id:int)', 'PageController:edit');  //форма редактирования страницы
$this->router->add('page-update', '/admin/page/update/', 'PageController:update', 'POST');  //обновление страницы

$this->router->add('page-delete', '/admin/page/delete/(id:int)', 'PageController:delete');  //удаление страницы

//записи
$this->router->add('post-list', '/admin/post/', 'PostController:list');  //список записей сайта
$this->router->add('post-create', '/admin/post/create/', 'PostController:create');  //форма создания записи
$this->router->add('post-add', '/admin/post/add/', 'PostController:add', 'POST');  //создание записи

$this->router->add('post-edit', '/admin/post/edit/(id:int)', 'PostController:edit');  //форма редактирования записи
$this->router->add('post-update', '/admin/post/update/', 'PostController:update', 'POST');  //обновление записи

$this->router->add('post-delete', '/admin/post/delete/(id:int)', 'PostController:delete');  //удаление записи

//настройки
$this->router->add('settings', '/admin/setting/', 'SettingController:index');  //список настроек сайта
$this->router->add('settings-update', '/admin/setting/', 'SettingController:update', 'POST');  //обновление настроек сайта
