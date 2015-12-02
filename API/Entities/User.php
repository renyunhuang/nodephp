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

    public function getId()
    {
        return $this->id;
    }

    public function getOpenId()
    {
        return $this->$openid;
    }

    public function setOpenId($openid)
    {
        $this->openid = $openid;
    }
}