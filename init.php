<?php


// init di

//constant definition list
defined('DS') or define('DS', DIRECTORY_SEPARATOR);
defined('WEB_ROOT_PATH') or define('WEB_ROOT_PATH', realpath(__DIR__));
defined('INJECTION_CONFIG_PATH') or define('INJECTION_CONFIG_PATH', WEB_ROOT_PATH . DS . 'config' . DS . 'Injection' . DS);
defined('APP_PATH') or define('APP_PATH', realpath(__DIR__) . DS . 'api' . DS);
defined('RESOURCE_PATH') or define('RESOURCE_PATH', realpath(__DIR__ . DS . 'api' . DS . 'Resources' . DS));
defined('APP_VIEWS_CONFIG') or define('APP_VIEWS_CONFIG', realpath(__DIR__ . DS . 'api' . DS));
defined('APP_VIEWS_PATH') or define('APP_VIEWS_PATH', realpath(APP_PATH . 'Resources' . DS));
defined('VENDOR_PATH') or define('VENDOR_PATH', realpath(__DIR__ . DS . 'vendor' . DS));
defined('APP_CONFIG_PATH') or define('APP_CONFIG_PATH', realpath(APP_PATH . 'Config' . DS));

require_once('route.php');


