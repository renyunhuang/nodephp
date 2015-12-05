<?php
namespace API\Documents;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\EmbeddedDocument */
class Address
{
    /** @ODM\String */
    private $address;
    /** @ODM\String */
    private $city;
    /** @ODM\String */
    private $state;
    /** @ODM\String */
    private $zipcode;

    public function getAddress() { return $this->address; }
    public function setAddress($address) { $this->address = $address; }
    public function getCity() { return $this->city; }
    public function setCity($city) { $this->city = $city; }
    public function getState() { return $this->state; }
    public function setState($state) { $this->state = $state; }
    public function getZipcode() { return $this->zipcode; }
    public function setZipcode($zipcode) { $this->zipcode = $zipcode; }
}