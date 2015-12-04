<?php
namespace Nodephp\Controller;

use Nodephp\Core\NodeResponse;
use Nodephp\Traits\SmartyRender;


class CBaseController
{
    use SmartyRender;

    public function __construct()
    {
        $this->prepareHandle();
    }

    public function prepareHandle()
    {
        set_time_limit(30);
        ini_set('memory_limit', '32M');
    }

    public function outputToJson($data=array())
    {
        $res = new NodeResponse();
        $res->headers->set('Content-Type', 'application/json');
        $res->setContent(json_encode($data, JSON_HEX_QUOT));
        return $res;
    }
}