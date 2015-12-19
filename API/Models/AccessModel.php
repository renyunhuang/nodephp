<?php
/**
 * @Author: renyun.huang@gmail.com
 * @Date: 15-12-18
 * @Time: 下午2:51
 */
namespace API\Models;

use API\Documents\Employee;
use API\Documents\Address;
use API\Documents\Project;
use API\Documents\Manager;
use API\Entities\User;

use API\Models\AppModel;

class AccessModel extends AppModel
{

    public function __construct()
    {
        parent::__construct();
    }

    public function docPersist()
    {
        $employee = new Employee();
        $employee->setName('Employee');
        $employee->setSalary(50000);
        $employee->setStarted(new DateTime());

        $address = new Address();
        $address->setAddress('555 Doctrine Rd.');
        $address->setCity('Nashville');
        $address->setState('TN');
        $address->setZipcode('37209');
        $employee->setAddress($address);

        $project = new Project('New Project');
        $manager = new Manager();
        $manager->setName('Manager');
        $manager->setSalary(1000000);
        $manager->setStarted(new DateTime());


        $this->odmPersistTrait($employee);
        $this->odmPersistTrait($address);
        $this->odmPersistTrait($project);
        $this->odmPersistTrait($manager);
        $this->odmPersistTrait();
    }

    public function ormPersist()
    {
        # create
        $user = new User();
        $user->setUserName('orm_demo');
        $user->setOpenId(crypt('orm_demo', 'nd'));
        $user->setPassword(crypt('orm_demo', '$1$somethin$'));
        $this->ormPersistTrait($user);
        $this->ormFlushTrait();
        # findAll
        $users = $this->ormGetRepositoryTrait(User::ENTITY_NAME)->findAll();;

        while ($user = array_shift($users)) {
            echo sprintf("-%s\n", $user->getOpenId());
            $lastuid = $user->getId();
        }
        # find
        $user = $this->ormFindTrait(User::ENTITY_NAME, $lastuid);
        if ($user) {
            echo sprintf("username:%s", $user->getUserName());
        }
        #dql
        $dql = "SELECT u.openid FROM " . User::ENTITY_NAME . " u ORDER BY u.id DESC";
        $query = $this->ormCreateQueryTrait($dql);
        $rs = $query->getArrayResult();
        foreach ((array)$rs as $row) {
            echo $row['openid'] . nl2br(PHP_EOL);
        }
    }
}