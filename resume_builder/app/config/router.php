<?php

use Phalcon\Mvc\Router;

$router = new Router(false);
$router->setDefaultNamespace('App\Controllers');

$router->removeExtraSlashes(true);

// Create employee
$router->addPost('/employee/create', [
    'controller' => 'employee',
    'action' => 'create'
]);

// Get all
$router->addGet('/employee', [
    'controller' => 'employee',
    'action' => 'getAll'
]);

// Get one
$router->addGet('/employee/{id}', [
    'controller' => 'employee',
    'action' => 'getEmployee'
]);

// Update
$router->addPut('/employee/update/{id}', [
    'controller' => 'employee',
    'action' => 'update'
]);

// Delete
$router->addDelete('/employee/{id}', [
    'controller' => 'employee',
    'action' => 'delete'
]);

return $router;
