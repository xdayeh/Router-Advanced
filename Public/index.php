<?php

namespace MVC;

use MVC\Core\Application;

define('DS', DIRECTORY_SEPARATOR);
define('APP_PATH', realpath(dirname(__FILE__)) . DS . '..' . DS . 'Application' . DS);
require_once APP_PATH . 'Core' . DS .'AutoLoader.php';

$app = new Application(APP_PATH);

$app->router->get(DS, function (){
    echo 'Good Home Page';
});

$app->router->get(DS.'about', function (){
    echo 'About Page';
});

$app->run();