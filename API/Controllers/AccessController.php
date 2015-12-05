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
}