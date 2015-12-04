<?php
namespace Nodephp\Core;

use Nodephp\Traits\SmartyRender;
use Symfony\Component\HttpFoundation\Response;

class NodeResponse extends Response
{
    use SmartyRender;

    public function __construct($content = '', $status = 200, $headers = array())
    {
        parent::__construct($content, $status, $headers);
    }

    public function Render($statusCode = 404)
    {
        $this->setStatusCode($statusCode);
        if (404 == intval($statusCode)) {
            $this->setContent(nl2br("Sorry \nfor 404!"));
        } elseif (500 == intval($statusCode)) {
            $this->setContent(nl2br("Sorry \nfor 500!"));
        }
    }
}