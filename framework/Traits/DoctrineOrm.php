<?php

namespace Nodephp\Traits;

trait DoctrineOrm
{

    private $entityManger = null;

    final public function initOrmTrait()
    {
        if (file_exists(APP_PATH . DS . '..' . DS . 'bootstrap.php')) {
            require_once(APP_PATH . DS . '..' . DS . 'bootstrap.php');
            $this->entityManger = isset(get_defined_vars()['entityManager']) ?
                get_defined_vars()['entityManager'] : null;
        } else {
            throw new \Exception('could not find the bootstrap from:' . APP_PATH . DS . 'bootstrap.php');
        }
    }

    public function ormPersistTrait($entity)
    {
        if ($this->entityManger) {
            $this->entityManger->persist($entity);
        }
    }

    public function ormFlushTrait()
    {
        if ($this->entityManger) {
            $this->entityManger->flush();
        }
    }

    public function ormFindAllTrait()
    {
        if ($this->entityManger) {
            return $this->entityManger->findAll();
        }
    }

    public function ormFindTrait($entity, $id)
    {
        if ($this->entityManger) {
            return $this->entityManger->find($entity, $id);
        }
    }

    public function ormGetRepositoryTrait($entity)
    {
        if ($this->entityManger) {
            return $this->entityManger->getRepository($entity);
        }
    }

    public function ormCreateQueryTrait($dql)
    {
        if ($this->entityManger) {
            return $this->entityManger->createQuery($dql);
        }
    }
}