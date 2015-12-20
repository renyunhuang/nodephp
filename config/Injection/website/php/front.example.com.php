<?php
/**
 * @Author: renyun.huang@gmail.com
 * @Date: 15-12-19
 * @Time: 下午12:41
 */
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

global $di, $request, $routes;

#.html config
$routes->add('front_index', new Route('/{params}.html', array(
    'params' => null,
    '_controller' => function (Request $request) {
        if (!file_exists(APP_FRONT_RESOURCE_PATH . $request->getPathInfo())) {
            throw new ResourceNotFoundException(APP_FRONT_RESOURCE_PATH . $request->getPathInfo());
        }
        $file = file_get_contents(APP_FRONT_RESOURCE_PATH . $request->getPathInfo(), false, null, -1);

        return new Response($file, '200', array('Content-Type' => 'text/html'));
    }
),
    array(
        '_method' => 'GET',
    )));
#.css config
$routes->add('css', new Route('/{path}/{file}.{_format}', array(
    'file' => null,
    '_controller' => function (Request $request) {
        if (!file_exists(APP_FRONT_RESOURCE_PATH . $request->getPathInfo())) {
            throw new ResourceNotFoundException(APP_FRONT_RESOURCE_PATH . $request->getPathInfo());
        }
        $css = file_get_contents(APP_FRONT_RESOURCE_PATH . $request->getPathInfo(), false, null, -1);
        $response = new Response($css);
        $response->headers->set('Content-Type', 'text/css');

        return $response;
    },
),
    array(
        '_method' => 'GET',
        '_format' => 'css|min.css',
        'path' => 'dist/css|assets/css|app/css'
    )));
#.js config
$routes->add('js', new Route('/{path}/{file}.{_format}', array(
    'file' => null,
    '_controller' => function (Request $request) {
        if (!file_exists(APP_FRONT_RESOURCE_PATH . $request->getPathInfo())) {
            throw new ResourceNotFoundException(APP_FRONT_RESOURCE_PATH . $request->getPathInfo());
        }
        $js = file_get_contents(APP_FRONT_RESOURCE_PATH . $request->getPathInfo(), false, null, -1);
        $response = new Response($js);
        $response->headers->set('Content-Type', 'text/javascript');

        return $response;
    },
),
    array(
        '_method' => 'GET',
        '_format' => 'js|min.js',
        'path' => 'dist/js|assets/js|assets/js/vendor|app/js'
    )));
#.jpeg config
$routes->add('img', new Route('/img/{params}', array(
    'params' => null,
    '_controller' => function (Request $request) {
        if (!file_exists(APP_FRONT_RESOURCE_PATH . $request->getPathInfo())) {
            throw new ResourceNotFoundException(APP_FRONT_RESOURCE_PATH . $request->getPathInfo());
        }
        $img = file_get_contents(APP_FRONT_RESOURCE_PATH . $request->getPathInfo(), false, null, -1);
        $response = new Response($img);
        $response->headers->set('Content-Type', 'image/jpeg');

        return $response;
    }
)));

#.font config
$routes->add('font', new Route('/{path}/{file}.{_format}', array(
    'file' => null,
    '_controller' => function (Request $request) {
        if (!file_exists(APP_FRONT_RESOURCE_PATH . $request->getPathInfo())) {
            throw new ResourceNotFoundException(APP_FRONT_RESOURCE_PATH . $request->getPathInfo());
        }
        $js = file_get_contents(APP_FRONT_RESOURCE_PATH . $request->getPathInfo(), false, null, -1);
        $response = new Response($js);
        $response->headers->set('Content-Type', 'text/javascript');

        return $response;
    },
),
    array(
        '_method' => 'GET',
        '_format' => 'ttf|woff2|woff',
        'path' => 'dist/fonts|assets/fonts|app/fonts'
    )));

