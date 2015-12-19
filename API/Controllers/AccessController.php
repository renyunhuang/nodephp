<?php
namespace API\Controllers;

use API\Models\AccessModel;
use Nodephp\Traits\Validator;
use API\Controllers\AppController;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class AccessController extends AppController
{
    use Validator;

    public function indexAction(Request $request)
    {
        try {
            self::checkIndexAction($request);
            $this->renderTrait('index.tpl', ['Name' => 'b']);
        } catch (\Exception $e) {
            echo $e->getMessage();die;
        }
    }

    static public function checkIndexAction($request)
    {
        #self::throwMsg('err msg', 'test');
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