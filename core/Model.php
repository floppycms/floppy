<?php

namespace Core;

use Core\Libs\Database\QueryBuilder;

abstract class Model
{
    protected $di;

    protected $db;

    protected $config;

    protected $queryBuilder;

    public function __construct(\Core\DI\DI $di)
    {
        $this->di = $di;
        $this->db = $this->di->get('db');
        $this->config = $this->di->get('config');
        $this->queryBuilder = new QueryBuilder();
    }
}