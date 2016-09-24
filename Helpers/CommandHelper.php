<?php
/**
 * https://magento2training.com
 * User: Mahmudur Rahman
 * Date: 24-09-16
 * Time: 12.01
 */

namespace Helpers;

use Commands\Command;
class CommandHelper
{
    var $command;

    function __construct(Command $command)
    {
        $this->command = $command;
    }

    function getModuleBasePath()
    {
        return $this->command->app_code_path.$this->command->package_name.DS.$this->command->module_name.DS;
    }

    function writeCodeFile($file_path, $content)
    {
        if(!file_exists($this->getModuleBasePath()))
            mkdir($this->getModuleBasePath(), 0755, true);

        $output_file = fopen($file_path, "w") or die("Unable to open file: ".$file_path);
        fwrite($output_file, $content);
        fclose($output_file);

        echo "\e[32m File created: ".$file_path."\e[0m \n";
    }

    function replacePlaceHolders($template_file_contents, $data)
    {

        foreach ($data as $find=>$replace)
        {
            $template_file_contents = str_replace('{{'.$find.'}}', $replace, $template_file_contents);
        }

        return $template_file_contents;
    }
}