<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Core\Application;
use Core\DI\DI;

try{

    $di = new DI();

    //ToDo загрузка зависимостей в контейнер

    $app = new Application($di);
    $app->run();

} catch(\ErrorException $e){
    echo $e->getMessage();
}