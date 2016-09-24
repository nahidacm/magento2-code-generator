<?php
/**
 * https://magento2training.com
 * User: Mahmudur Rahman
 * Date: 24-09-16
 * Time: 07.02
 */

namespace Commands;


/**
 * Generates a very basic Magento Module
 * Class GenerateModule
 * @package Commands
 *
 */
class GenerateModule extends Command
{

    function execute()
    {
        $this->writeRegistrationFile();

        return "\n Done..";
    }

    function getModuleBasePath()
    {
        return $this->app_code_path.$this->package_name.DS.$this->module_name.DS;
    }

    function writeRegistrationFile()
    {
        $template_file_path = ROOT.'templates/php/registration.tpl';
        $output_file_path = $this->getModuleBasePath().'registration.php';

        $template_file_contents = file_get_contents($template_file_path);
        $data = array(
            'package_name'=>$this->package_name,
            'module_name'=>$this->module_name
        );

        $output_file_contents = $this->replacePlaceHolders($template_file_contents, $data);

        $this->writeCodeFile($output_file_path, $output_file_contents);
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