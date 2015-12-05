<?php
namespace API\Documents;

use API\Documents\BaseEmployee;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\Document */
class Manager extends BaseEmployee
{
    /** @ODM\ReferenceMany(targetDocument="API\Documents\Project") */
    private $projects;
    public function __construct() { $this->projects = new ArrayCollection(); }

    public function getProjects() { return $this->projects; }
    public function addProject(Project $project) { $this->projects[] = $project; }
}