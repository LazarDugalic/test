<?php

use MVC\Core\Router;


require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Routing
 */

$router = new Router();

$route = ltrim($_SERVER['QUERY_STRING'], '/');

$router->add('', ['controller' => 'Home', 'action' => 'index']);

$router->add('{controller}/{action}');

if ($route !== '') {
    $router->dispatch($route);
} else {
    $router->dispatch("main/index");
}

