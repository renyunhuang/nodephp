<?php

use Symfony\Component\DependencyInjection\Reference;
require_once('route.php');
// init di


$di->register('context', 'Symfony\Component\Routing\RequestContext');

$di->register('matcher', 'Symfony\Component\Routing\Matcher\UrlMatcher')
    ->setArguments(array($routes, new Reference('context')));

$di->register('resolver', 'Symfony\Component\HttpKernel\Controller\ControllerResolver');

$di->register('listener.router', 'Symfony\Component\HttpKernel\EventListener\RouterListener')
    ->setArguments(array(new Reference('matcher')));

$di->register('listener.response', 'Symfony\Component\HttpKernel\EventListener\ResponseListener')
    ->setArguments(array('UTF-8'));

$di->register('listener.exception', 'Symfony\Component\HttpKernel\EventListener\ExceptionListener')
    ->setArguments(array('API\\Controller\\ErrorController::exceptionAction'));

$di->register('dispatcher', 'Symfony\Component\EventDispatcher\EventDispatcher')
    ->addMethodCall('addSubscriber', array(new Reference('listener.router')))
    ->addMethodCall('addSubscriber', array(new Reference('listener.response')));

$di->register('listener.string_response', 'API\\Listeners\\TextListener');
$di->getDefinition('dispatcher')
    ->addMethodCall('addSubscriber', array(new Reference('listener.string_response')));

$di->register('NodeCore', 'Nodephp\\Core\\NodeCore')
    ->setArguments(array($routes, new Reference('dispatcher'), new Reference('resolver')));

