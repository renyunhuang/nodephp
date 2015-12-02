<?php

require_once (__DIR__) . '/vendor/autoload.php';
require_once 'init.php';

use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

$di->get('NodeCore')->handle($request);




