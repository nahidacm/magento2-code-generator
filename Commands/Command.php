<?php
/**
 * https://magento2training.com
 * User: Mahmudur Rahman
 * Date: 24-09-16
 * Time: 11.50
 */

namespace Commands;

use Helpers\CommandHelper;
abstract class Command
{
    var $params;
    var $app_code_path;
    var $package_name;
    var $module_name;
    var $helper;

    function __construct($argv)
    {
        $this->params = $argv;
        $this->package_name = isset($argv[2])?$argv[2]:null;
        $this->module_name = isset($argv[3])?$argv[3]:null;
        $this->app_code_path = MAGENTO_ROOT.'app'.DS.'code'.DS;
        $this->helper = new CommandHelper($this);
    }

    abstract function execute();

}