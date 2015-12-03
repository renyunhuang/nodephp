<?php

use Symfony\Component\Routing\Route;
use Nodephp\Di\CBaseContainer;

$di = CBaseContainer::getInstance();
$di->register('routes', 'Symfony\Component\Routing\RouteCollection');


$routes = $di->get('routes');

$routes->add('access', new Route('/ebp-4', array(
    '_controller' => 'API\\Controllers\\AccessController::indexAction'
)));

$routes->add('css', new Route('/css/{params}', array(
    'params' => null,
    '_controller' => function(Request $request) {
        $css = file_get_contents(RESOURCE_PATH.$request->getPathInfo(), false, null, -1);
        $response = new Response($css);
        $response->headers->set('Content-Type', 'text/css');
        return $response;
    }
)));

$routes->add('js', new Route('/js/{params}', array(
    'params' => null,
    '_controller' => function(Request $request) {
        $js = file_get_contents(RESOURCE_PATH.$request->getPathInfo(), false, null, -1);
        $response = new Response($js);
        $response->headers->set('Content-Type', 'text/javascript');
        return $response;
    }
)));

$routes->add('img', new Route('/img/{params}', array(
    'params' => null,
    '_controller' => function(Request $request) {
        $img = file_get_contents(RESOURCE_PATH.$request->getPathInfo(), false, null, -1);
        $response = new Response($img);
        $response->headers->set('Content-Type', 'image/jpeg');
        return $response;
    }
)));



