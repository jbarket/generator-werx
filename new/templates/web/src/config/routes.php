<?php

/**
 * Default routes.
 * See https://github.com/auraphp/Aura.Router for more info on routing.
 * @var $router \Aura\Router\RouteCollection
 */
$router->add(null, '/');
$router->add(null, '/{controller}');
$router->add(null, '/{controller}/{action}');
$router->add(null, '/{controller}/{action}/{id}');