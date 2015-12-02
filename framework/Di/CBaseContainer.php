<?php

namespace Nodephp\Di;

use Symfony\Component\DependencyInjection;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class CBaseContainer
{
    private static $instance=null;

    private function __construct(){

    }
    private function __clone(){

    }
    public static function getInstance(){
        if (null == self::$instance) {
            self::$instance = new ContainerBuilder();
        }
        return self::$instance;
    }
}
