<?php
namespace Nodephp\Controller;

use Nodephp\Core\NodeResponse;


class CBaseController
{

    public function outputToJson($data=array())
    {
        $res = new NodeResponse();
        $res->headers->set('Content-Type', 'application/json');
        $res->setContent(json_encode($data, JSON_HEX_QUOT));
        return $res;
    }
}