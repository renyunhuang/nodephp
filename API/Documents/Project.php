<?php
namespace API\Documents;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\Document */
class Project
{
    /** @ODM\Id */
    private $id;

    /** @ODM\String */
    private $name;

    public function __construct($name) { $this->name = $name; }
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function setName($name) { $this->name = $name; }
}