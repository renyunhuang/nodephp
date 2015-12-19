<?php

namespace Nodephp\Di;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;
use Symfony\Component\DependencyInjection\ContainerInterface;

class CBaseContainer
{
    private static $instance = null;
    public static $loader = null;
    public static $container = null;
    private static $loadBy = array('php'=>'Symfony\Component\DependencyInjection\Loader\PhpFileLoader');

    private function __construct()
    {

    }

    private function __clone()
    {

    }

    public static function getInstance($type = 'php')
    {
        if (null == self::$instance) {
            self::$loader = self::$container = null;
            self::$instance = new self();
            if (!isset(self::$loadBy[$type])) {
                throw \InvalidArgumentException('Invalid type!');
            }
            self::$loader = new self::$loadBy[$type](self::$container = new ContainerBuilder(), new FileLocator());
        }

        return self::$instance;
    }

    public function loadFile($file, $type = null)
    {
        if(self::$loader) {
            return self::$loader->load($file, $type);
        }
    }

    public function register($id, $class = null)
    {
        if(self::$container) {
            return self::$container->register($id, $class);
        }
    }

    public function get($id, $invalidBehavior = ContainerInterface::EXCEPTION_ON_INVALID_REFERENCE)
    {
        if(self::$container) {
            return self::$container->get($id, $invalidBehavior);
        }
    }

    public function getDefinition($id)
    {
        if(self::$container) {
            return self::$container->getDefinition($id);
        }
    }
}
