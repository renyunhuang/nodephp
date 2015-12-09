<?php

namespace Nodephp\Traits;

trait DoctrineOrm
{

    private $entityManger = null;

    final public function __initDoctrineTrait()
    {
        if (file_exists(APP_PATH . '/bootstrap.php')) {
            require_once(APP_PATH . '/bootstrap.php');
            $this->entityManger = isset(get_defined_vars()['entityManager']) ?
                get_defined_vars()['entityManager'] : null;

        }
    }

    public function persist($entity)
    {
        if($this->entityManger) {
            $this->entityManger->persist($entity);
        }
    }

    public function flush()
    {
        if($this->entityManger) {
            $this->entityManger->flush();
        }
    }

    public function findAll()
    {
        if($this->entityManger) {
            return $this->entityManger->findAll();
        }
    }

    public function find($entity, $id)
    {
        if($this->entityManger) {
            return $this->entityManger->find($entity, $id);
        }
    }

    public function getRepository($entity)
    {
        if($this->entityManger) {
            return $this->entityManger->getRepository($entity);
        }
    }

    public function createQuery($dql)
    {
        if($this->entityManger) {
            return $this->entityManger->createQuery($dql);
        }
    }
}