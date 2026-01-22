<?php

use Phalcon\Autoload\Loader;

$loader = new Loader();

$loader->setNamespaces([
    'App\Controllers' => $config->application->controllersDir,
    'App\Models'      => $config->application->modelsDir,
    'App\Services'    => $config->application->servicesDir,
    'App\Utils'       => $config->application->utilsDir,
    'App\Seeders'     => $config->application->seedersDir,
]);

$loader->register();
