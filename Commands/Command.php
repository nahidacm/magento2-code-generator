<?php
/**
 * https://magento2training.com
 * User: Mahmudur Rahman
 * Date: 24-09-16
 * Time: 11.50
 */

namespace Commands;


class Command
{
    var $params;
    var $app_code_path;
    var $package_name;
    var $module_name;

    function __construct($argv)
    {
        $this->params = $argv;
        $this->package_name = $argv[2];
        $this->module_name = $argv[3];
        $this->app_code_path = MAGENTO_ROOT.'app'.DS.'code'.DS;
    }

}