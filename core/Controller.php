<?php

namespace Core;

/**
 * Базовый класс для всех контроллеров приложения
 */
abstract class Controller
{
    /**
     * Экземпляр класса DI
     *
     * @var \Core\DI\DI
     */
    protected $di;

    protected $db;

    protected $view;

    protected $config;

    protected $request;

    protected $load;

    public function __construct(\Core\DI\DI $di)
    {
        $this->di = $di;
        $this->db = $this->di->get('db');
        $this->view = $this->di->get('view');
        $this->config = $this->di->get('config');
        $this->request = $this->di->get('request');
        $this->load = $this->di->get('load');
        
        $this->initVars();
    }

    public function __get($key)
    {
        return $this->di->get($key);
    }

    public function initVars()
    {
        $vars = array_keys(get_object_vars($this));

        foreach($vars as $var){
            if($this->di->has($var)){
                $this->{$var} = $this->di->get($var);
            }
        }

        return $this;
    }
}