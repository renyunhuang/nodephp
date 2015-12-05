<?php
require_once("vendor/autoload.php");

use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use Doctrine\ODM\MongoDB\Tools\Console\Helper\DocumentManagerHelper;
use Symfony\Component\Console\Helper\HelperSet;

$connection = new Connection();

$config = new Configuration();
$config->setProxyDir(__DIR__.'/Proxies');
$config->setProxyNamespace('Proxies');
$config->setHydratorDir(__DIR__.'/Hydrators');
$config->setHydratorNamespace('Hydrators');
$config->setDefaultDB('doctrine_odm');
$config->setMetadataDriverImpl(AnnotationDriver::create(__DIR__.'/API/Documents'));

AnnotationDriver::registerAnnotationClasses();

$dm = DocumentManager::create($connection, $config);

$helperSet = new HelperSet(array(
    'dm' => new DocumentManagerHelper($dm),
));
