<?php


#constant definition list
defined('DS') or define('DS', DIRECTORY_SEPARATOR);
defined('WEB_ROOT_PATH') or define('WEB_ROOT_PATH', realpath(__DIR__));
defined('INJECTION_CONFIG_PATH') or define('INJECTION_CONFIG_PATH', WEB_ROOT_PATH . DS . 'config' . DS . 'Injection' . DS);
defined('VENDOR_PATH') or define('VENDOR_PATH', realpath(__DIR__ . DS . 'vendor' . DS));
#api.nodephp.com
defined('APP_PATH') or define('APP_PATH', realpath(__DIR__) . DS . 'api' . DS);
defined('RESOURCE_PATH') or define('RESOURCE_PATH', realpath(__DIR__ . DS . 'api' . DS . 'Resources' . DS));
defined('APP_VIEWS_CONFIG') or define('APP_VIEWS_CONFIG', realpath(__DIR__ . DS . 'api' . DS));
defined('APP_VIEWS_PATH') or define('APP_VIEWS_PATH', realpath(APP_PATH . 'Resources' . DS));
#front.nodephp.com
defined('APP_FRONT_RESOURCE_PATH') or define('APP_FRONT_RESOURCE_PATH', WEB_ROOT_PATH . DS . 'front' . DS . 'Resources' . DS);
defined('APP_FRONT_HOST') or define('APP_FRONT_HOST', 'http://nodephp.localhost.com');

require_once('route.php');


