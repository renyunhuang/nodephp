<?php
namespace Nodephp\Traits;

trait SmartyRender
{
    private $smarty = null;

    final public function initSmartyRenderTrait()
    {
        $libpath = VENDOR_PATH . DS . 'smarty' . DS . 'smarty' . DS . 'libs' . DS . 'Smarty.class.php';
        if (file_exists($libpath) && include($libpath)) {
            if (!$this->smarty) {
                $this->smarty = new \Smarty();
            }
        } else {
            throw new \Exception('Could not find Smarty.class.php from:' . $libpath);
        }
    }

    public function renderTrait($template = 'index.tpl', $arrParams = array())
    {
        $instance = is_object($this->smarty) ? $this->smarty : $this->initSmartyRenderTrait();
        array_map(function ($k, $v) use ($instance) {
            $instance->assign($k, $v);
        }, array_keys($arrParams), array_values($arrParams));
        $instance->display($template);
    }

    public function initSmartyTrait()
    {
        $this->smarty->setTemplateDir(APP_VIEWS_PATH);
        $this->smarty->setConfigDir(APP_VIEWS_CONFIG);
        $this->smarty->debugging = true;
        $this->smarty->caching = false;
        $this->smarty->cache_lifetime = 0;
    }

}