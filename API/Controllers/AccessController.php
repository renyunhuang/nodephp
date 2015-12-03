<?php
namespace API\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Nodephp\Controller\CBaseController;

class AccessController extends CBaseController
{
    public function indexAction(Request $request)
    {
        $this->render('index.tpl',['Name'=>'b']);
    }
}