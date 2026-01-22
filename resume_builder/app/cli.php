<?php

use Phalcon\Di\FactoryDefault\Cli as CliDI;

require dirname(__DIR__) . '/vendor/autoload.php';

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

// Create CLI DI container
$di = new CliDI();

// Load config
$config = include APP_PATH . '/config/config.php';
$di->setShared('config', $config);

// Load services (database)
include APP_PATH . '/config/services.php';

// Load autoloader
include APP_PATH . '/config/loader.php';

// Get command arguments
$task = $argv[1] ?? null;
$action = $argv[2] ?? null;

if (!$task || !$action) {
    echo "Usage: php app/cli.php employeeSeeder run\n";
    exit;
}

// Convert to Seeder class name
$className = 'App\\Seeders\\' . ucfirst($task);

// Create object
$seeder = new $className();

// Call function
$seeder->$action();
