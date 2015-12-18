<?php
namespace API\Controllers;

use Nodephp\Controller\CBaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Nodephp\Traits\DoctrineOdm;
use API\Services\AccessSerivce;
use API\Documents\Employee;
use API\Documents\Address;
use API\Documents\Project;
use API\Documents\Manager;


class AccessController extends CBaeController
{
    use DoctrineOdm;

    public function indexAction(Request $request)
    {
        try {
            self::checkIndexAction($request);
            $this->render('index.tpl', ['Name' => 'b']);
        } catch (\Exception $e) {

        }
    }

    static public function checkIndexAction($request)
    {
        self::throwMsg('err msg');
    }

    public function docPersistAction()
    {
        try {
            $accessService = new AccessSerivce();
            $accessService->docPersist();
        } catch (\InvalidArgumentException $e) {

        } catch (\Exception $e) {

        }

    }


    /**
     * reference http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/tutorials/getting-started.html
     * @param Request $request
     */
    public function ormPersistAction(Request $request)
    {
        try {
            $accessService = new AccessSerivce();
            $accessService->ormPersist();
        } catch (\Exception $e) {

        }
    }
}