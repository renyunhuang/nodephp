<?php

use Symfony\Component\Routing\Route;
use Nodephp\Di\CBaseContainer;

$di = CBaseContainer::getInstance();
$di->register('routes', 'Symfony\Component\Routing\RouteCollection');


$routes = $di->get('routes');

$routes->add('access', new Route('/ebp-4', array(
    '_controller' => 'API\\Controllers\\AccessController::indexAction'
)));




