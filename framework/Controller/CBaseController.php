<?php
namespace Nodephp\Controller;

use Nodephp\Traits\Validator;
use Nodephp\Core\NodeResponse;
use Nodephp\Traits\SmartyRender;
use Symfony\Component\HttpFoundation\Response;

class CBaseController
{
    use SmartyRender;
    use Validator;

    public function __construct()
    {
        $this->__initSmartyTrait();
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

    public function redirect($url, $status='301', $header = array())
    {
        $this->checkValidUrl($url);
        $this->checkValidStatus('direct', $status);
        $redirectResponse = new Response('', $status, $header);
        $redirectResponse->headers->set('Location', $url);

        return $redirectResponse;
    }
}