<?php

use Phalcon\Mvc\Router;

$router = new Router(false);
$router->setDefaultNamespace('App\Controllers');

$router->removeExtraSlashes(true);

//Employee Routes
$router->addPost('/employee/create', [
    'controller' => 'employee',
    'action' => 'create'
]);

$router->addGet('/employee', [
    'controller' => 'employee',
    'action' => 'getAll'
]);


$router->addGet('/employee/{id}', [
    'controller' => 'employee',
    'action' => 'getEmployee'
]);

$router->addPut('/employee/update/{id}', [
    'controller' => 'employee',
    'action' => 'update'
]);

$router->addDelete('/employee/{id}', [
    'controller' => 'employee',
    'action' => 'delete'
]);

//Education Routes
$router->addGet('/education/employee/{employeeId}', [
    'controller' => 'education',
    'action' => 'getEmployeeEducation'
]);

return $router;
