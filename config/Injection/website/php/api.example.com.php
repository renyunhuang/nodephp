<?php
/**
 * @Author: renyun.huang@gmail.com
 * @Date: 15-12-19
 * @Time: 下午12:41
 */
use Symfony\Component\Routing\Route;
use Symfony\Component\DependencyInjection\Reference;

global $di, $request, $routes;

$routes->add('access', new Route('/ebp-4', array(
    '_controller' => 'API\\Controllers\\AccessController::indexAction'
)));

$routes->add('orm', new Route('/', array(
    '_controller' => 'API\\Controllers\\AccessController::ormPersistAction'
)));


