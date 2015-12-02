<?php
require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\Annotations\AnnotationReader;

$paths = array( realpath(__DIR__."/API/Entities") );
$isDevMode = TRUE;

$dbParam = array(
    'driver'    => 'pdo_mysql',
    'user'      => '~',
    'password'  => '~',
    'dbname'    => '~',
);

$cache = new \Doctrine\Common\Cache\ArrayCache();

$reader = new AnnotationReader();
$driver = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver($reader, $paths);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$config->setMetadataCacheImpl( $cache );
$config->setQueryCacheImpl( $cache );
$config->setMetadataDriverImpl( $driver );

$entityManager = EntityManager::create($dbParam, $config);
