<?php
namespace API\Controllers;

use API\Models\AccessModel;
use Nodephp\Controller\CBaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class AccessController extends CBaseController
{


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
            $access = new AccessModel();
            $access->docPersist();
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
            $access = new AccessModel();
            $access->ormPersist();
        } catch (\Exception $e) {

        }
    }
}