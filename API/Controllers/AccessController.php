<?php
namespace API\Controllers;

use Nodephp\Controller\CBaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Nodephp\Traits\DoctrineOdm;
use API\Documents\Employee;
use API\Documents\Address;
use API\Documents\Project;
use API\Documents\Manager;

class AccessController extends CBaseController
{
    use DoctrineOdm;

    public function indexAction(Request $request)
    {
        $this->render('index.tpl', ['Name' => 'b']);
    }

    public function docPersistAction()
    {
        try {
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


            $this->persist($employee);
            $this->persist($address);
            $this->persist($project);
            $this->persist($manager);
            $this->flush();
        } catch (\InvalidArgumentException $e) {

        }
    }

    /**
     * reference http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/tutorials/getting-started.html
     * @param Request $request
     */
    public function ormPersistAction(Request $request)
    {
        try {
            # create
            $user = new User();
            $user->setUserName('orm_demo');
            $user->setOpenId(crypt('orm_demo', 'nd'));
            $user->setPassword(crypt('orm_demo', '$1$somethin$'));
            $this->persist($user);
            $this->flush();
            # findAll
            $users = $this->getRepository(User::ENTITY_NAME)->findAll();

            while ($user = array_shift($users)) {
                echo sprintf("-%s\n", $user->getOpenId());
                $lastuid = $user->getId();
            }
            # find
            $user = $this->find(User::ENTITY_NAME, $lastuid);
            if ($user) {
                echo sprintf("username:%s", $user->getUserName());
            }
            #dql
            $dql = "SELECT u.openid FROM " . User::ENTITY_NAME . " u ORDER BY u.id DESC";
            $query = $this->createQuery($dql);
            $rs = $query->getArrayResult();
            foreach ((array)$rs as $row) {
                echo $row['openid'] . nl2br(PHP_EOL);
            }
        } catch (\Exception $e) {

        }
    }
}