<?php
use Nodephp\Di\CBaseContainer;
use Symfony\Component\HttpFoundation\Request;


$request = Request::createFromGlobals();

$di = CBaseContainer::getInstance();
$di->register('routes', 'Symfony\Component\Routing\RouteCollection');
$routes = $di->get('routes');


//backend.nodephp.com
#$di->loadFile(INJECTION_CONFIG_PATH . 'website' . DS . 'php' . DS . 'backend.example.com.php');
//front.nodephp.com
$di->loadFile(INJECTION_CONFIG_PATH . 'website' . DS . 'php' . DS . 'front.example.com.php');
//api.nodephp.com
#$di->loadFile(INJECTION_CONFIG_PATH . 'website' . DS . 'php' . DS . 'api.example.com.php');
//footer.conf
$di->loadFile(INJECTION_CONFIG_PATH . 'website' . DS . 'php' . DS . 'footer.php');

