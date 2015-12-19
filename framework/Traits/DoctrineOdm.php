<?php

namespace Nodephp\Traits;

trait DoctrineOdm
{

    private $dm = null;


    public function initOdmTrait()
    {
        if (file_exists(APP_PATH . DS . '..' . DS . 'bootstrap_mongo.php')) {
            require_once(APP_PATH . DS . '..' . DS . 'bootstrap_mongo.php');
            $this->dm = isset(get_defined_vars()['dm']) ?
                get_defined_vars()['dm'] : null;

        } else {
            throw new \Exception('could not find the bootstrap from:' . APP_PATH . DS . 'bootstrap_mongo.php');
        }
    }

    public function odmPersistTrait($document)
    {
        if ($this->dm) {
            return $this->dm->persist($document);
        }
    }

    public function odmFlushTrait()
    {
        if ($this->dm) {
            return $this->dm->flush();
        }
    }
}