<?php

namespace Nodephp\Traits;

trait DoctrineOdm
{

    private $dm = null;

    public function __construct()
    {
        $this->__initOdmTrait();
    }

    public function __initOdmTrait()
    {
        if (file_exists(APP_PATH . '/bootstrap_mongo.php')) {
            require_once(APP_PATH . '/bootstrap_mongo.php');
            $this->dm = isset(get_defined_vars()['dm']) ?
                get_defined_vars()['dm'] : null;

        }
    }

    public function persist($document)
    {
        if ($this->dm) {
            return $this->dm->persist($document);
        }
    }

    public function flush()
    {
        if ($this->dm) {
            return $this->dm->flush();
        }
    }
}