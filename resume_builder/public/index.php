<?php
declare(strict_types=1);

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Application;

error_reporting(E_ALL);

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

try {

    $di = new FactoryDefault();//service container which automatically registers the all the services;

    // Load config
    $config = include APP_PATH . '/config/config.php';
    $di->setShared('config', $config);//register inside the DI container as a shared service

    // Load services (db, router, etc)
    include APP_PATH . '/config/services.php';

    // Load autoloader
    include APP_PATH . '/config/loader.php';

    $application = new Application($di);
//It takes the incoming HTTP request, routes it to the correct controller,
// executes your business logic, generates a response, and sends it back to the browser.
    echo $application->handle($_SERVER['REQUEST_URI'])->getContent();

} catch (\Exception $e) {

    echo $e->getMessage();
}
