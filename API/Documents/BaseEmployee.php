<?php
namespace API\Documents;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\MappedSuperclass */
abstract class BaseEmployee
{
    /** @ODM\Id */
    private $id;

    /** @ODM\Increment */
    private $change = 0;

    /** @ODM\Collection */
    private $notes = array();

    /** @ODM\String */
    private $name;

    /** @ODM\Int */
    private $salary;

    /** @ODM\Date */
    private $started;

    /** @ODM\Date */
    private $left;

    /** @ODM\EmbedOne(targetDocument="Address") */
    private $address;

    public function getId() { return $this->id; }

    public function getChanges() { return $this->changes; }
    public function incrementChanges() { $this->changes++; }
    public function getNotes() { return $this->notes; }
    public function addNote($note) { $this->notes[] = $note; }
    public function getName(){ return $this->name; }
    public function setName($name) { $this->name = $name; }
    public function getSalary() { return $this->salary; }
    public function setSalary($salary) { $this->salary = (int) $salary; }

    public function getStarted() { return $this->started; }
    public function setStarted(\DateTime $started) { $this->started = $started; }
    public function getLeft() { return $this->left; }
    public function setLeft(\DateTime $left) { $this->left = $left; }
    public function getAddress() { return $this->address; }
    public function setAddress(Address $address) { $this->address = $address; }
}






