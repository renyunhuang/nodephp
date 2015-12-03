<?php
namespace Nodephp\Traits;

trait SmartyRender
{
    private $smarty=null;

    public function __construct()
    {
        $libpath = VENDOR_PATH.'/smarty/smarty/libs/Smarty.class.php';
        require_once($libpath);
        if(!$this->smarty) {
            $this->smarty = new \Smarty();
            $this->initSmarty();
        }
    }

    public function render($template='index.tpl', $arrParams=array())
    {
        array_map(function($k,$v){
            $this->smarty->assign($k, $v);
        }, array_keys($arrParams),array_values($arrParams));

        $this->smarty->display($template);
    }

    public function initSmarty()
    {
        $this->smarty->setTemplateDir(API_VIEWS_PATH);
        $this->smarty->setConfigDir(API_VIEWS_CONFIG);
        $this->smarty->debugging = true;
        $this->smarty->caching = true;
        $this->smarty->cache_lifetime = 120;
    }

}