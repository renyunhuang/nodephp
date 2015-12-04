<?php
use Nodephp\Di\CBaseContainer;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

$di = CBaseContainer::getInstance();
$di->register('routes', 'Symfony\Component\Routing\RouteCollection');


$routes = $di->get('routes');

$routes->add('access', new Route('/ebp-4', array(
    '_controller' => 'API\\Controllers\\AccessController::indexAction'
)));

$routes->add('css', new Route('/css/{path}.{_format}', array(
    'path' => null,
    '_controller' => function (Request $request) {
        if (!file_exists(RESOURCE_PATH . $request->getPathInfo())) {
            $response = new Response();
            $response->setStatusCode(404);

            return $response;
        }
        $css = file_get_contents(RESOURCE_PATH . $request->getPathInfo(), false, null, -1);
        $response = new Response($css);
        $response->headers->set('Content-Type', 'text/css');

        return $response;
    },
),
    array(
        '_method' => 'GET',
        '_format' => 'css',
    )));

$routes->add('js', new Route('/js/{params}.{_format}', array(
    'params' => null,
    '_controller' => function (Request $request) {
        if (!file_exists(RESOURCE_PATH . $request->getPathInfo())) {
            $response = new Response();
            $response->setStatusCode(404);

            return $response;
        }
        $js = file_get_contents(RESOURCE_PATH . $request->getPathInfo(), false, null, -1);
        $response = new Response($js);
        $response->headers->set('Content-Type', 'text/javascript');

        return $response;
    },
),
    array(
        '_method' => 'GET',
        '_format' => 'js',
    )));

$routes->add('img', new Route('/img/{params}', array(
    'params' => null,
    '_controller' => function (Request $request) {
        if (!file_exists(RESOURCE_PATH . $request->getPathInfo())) {
            $response = new Response();
            $response->setStatusCode(404);

            return $response;
        }
        $img = file_get_contents(RESOURCE_PATH . $request->getPathInfo(), false, null, -1);
        $response = new Response($img);
        $response->headers->set('Content-Type', 'image/jpeg');

        return $response;
    }
)));



