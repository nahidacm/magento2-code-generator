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

    function writeRegistrationFile()
    {
        $template_file_path = ROOT.'templates/php/registration.tpl';
        $output_file_path = $this->helper->getModuleBasePath().'registration.php';

        $template_file_contents = file_get_contents($template_file_path);
        $data = array(
            'package_name'=>$this->package_name,
            'module_name'=>$this->module_name
        );

        $output_file_contents = $this->helper->replacePlaceHolders($template_file_contents, $data);

        $this->helper->writeCodeFile($output_file_path, $output_file_contents);
    }
}