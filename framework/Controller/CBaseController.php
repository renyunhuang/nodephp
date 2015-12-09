<?php
namespace Nodephp\Controller;

use Nodephp\Traits\Validator;
use Nodephp\Core\NodeResponse;
use Nodephp\Traits\DoctrineOrm;
use Nodephp\Traits\SmartyRender;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CBaseController
{
    use SmartyRender;
    use Validator;
    use DoctrineOrm;

    public function __construct()
    {
        $this->__initSmartyTrait();
        $this->__initDoctrineTrait();
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

    public function redirect($url, $way = 'html', $status = '301', $header = array())
    {
        $redirectResponse = RedirectResponse::create($url, $status, $header);
        if ('html' === $way) {
            $content = $redirectResponse->getContent();
            $this->render('redirect.tpl', ['content' => $content]);
        } else {
            return $redirectResponse;
        }
    }
}