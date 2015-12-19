<?php
namespace API\Entities;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=64)
     */
    protected $openid;

    /**
     * @ORM\Column(type="string", length=32)
     */
    protected $uname;

    /**
     * @ORM\Column(type="string", length=32)
     */
    protected $pwd;

    const ENTITY_NAME = 'API\\Entities\\User';

    public function getId()
    {
        return $this->id;
    }

    public function getOpenId()
    {
        return $this->openid;
    }

    public function getUserName()
    {
        return $this->uname;
    }

    public function getPassword()
    {
        return $this->pwd;
    }

    public function setOpenId($openid)
    {
        $this->openid = $openid;
    }

    public function setUserName($uname)
    {
        $this->uname = $uname;
    }

    public function setPassword($pwd)
    {
        $this->pwd = $pwd;
    }
}