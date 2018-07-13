<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Core\Application;
use Core\DI\DI;

try{

    $di = new DI();

    //загрузка зависимостей в контейнер
    $services = require __DIR__ . '/Config/service.php';

    foreach($services as $service){
        $provider = new $service($di);
        $provider->init();
    }

    $app = new Application($di);
    $app->run();

} catch(\ErrorException $e){
    echo $e->getMessage();
}