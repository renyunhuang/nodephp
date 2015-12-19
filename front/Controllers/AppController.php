<?php
/**
 * @Author: renyun.huang@gmail.com
 * @Date: 15-12-19
 * @Time: 下午1:51
 */
namespace Front\Controllers;


use Nodephp\Traits\Validator;
use Nodephp\Traits\SmartyRender;
use Nodephp\Controller\CBaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AppController extends CBaseController
{
    use SmartyRender;
    use Validator;

    public function __construct()
    {
        $this->prepareHandle();
        $this->initSmartyRenderTrait();
        $this->initSmartyConfig();
    }

    public function prepareHandle()
    {
        set_time_limit(30);
        ini_set('memory_limit', '32M');
    }

    public function redirect($url, $way = 'html', $status = '301', $header = array())
    {
        $redirectResponse = RedirectResponse::create($url, $status, $header);
        if ('html' === $way) {
            $content = $redirectResponse->getContent();
            $this->renderTrait('redirect.tpl', ['content' => $content]);
        } else {
            return $redirectResponse;
        }
    }

    public function initSmartyConfig()
    {
        $this->smarty->setTemplateDir(APP_VIEWS_PATH);
        $this->smarty->setConfigDir(APP_VIEWS_CONFIG);
        $this->smarty->debugging = true;
        $this->smarty->caching = false;
        $this->smarty->cache_lifetime = 0;
    }
}

