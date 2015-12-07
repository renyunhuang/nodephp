<?php
namespace Nodephp\Traits;

trait SmartyRender
{
    private $smarty=null;

    final public function __initSmartyTrait()
    {
        $libpath = VENDOR_PATH.'/smarty/smarty/libs/Smarty.class.php';
        require_once($libpath);
        if(!$this->smarty) {
            $this->smarty = new \Smarty();
            $this->initSmarty();
        }
    }

    public function render($template = 'index.tpl', $arrParams = array())
    {
        $instance = is_object($this->smarty) ? $this->smarty : $this->__initSmartyTrait();
        array_map(function ($k, $v) use ($instance) {
            $instance->assign($k, $v);
        }, array_keys($arrParams), array_values($arrParams));
        $instance->display($template);
    }

    public function initSmarty()
    {
        $this->smarty->setTemplateDir(API_VIEWS_PATH);
        $this->smarty->setConfigDir(API_VIEWS_CONFIG);
        $this->smarty->debugging = true;
        $this->smarty->caching = false;
        $this->smarty->cache_lifetime = 0;
    }

}