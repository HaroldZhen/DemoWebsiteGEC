<?php
require_once ('./class/smarty/libs/Smarty.class.php');

class Template extends Smarty
{
    function Template()
    {
        $this->template_dir = APP_REAL_PATH
            . "/templates/";
        $this->compile_dir = APP_REAL_PATH
            . "/templates_c/";
        $this->plugins_dir[] = APP_REAL_PATH
            . "/plugins/";
        $this->cache_dir = APP_REAL_PATH
            . "/cache/";
    }
}
?>