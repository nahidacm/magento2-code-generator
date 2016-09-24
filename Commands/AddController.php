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
class AddController extends Command
{
    var $front_name;

    function execute()
    {
        $this->front_name = $this->params[4];

        $this->writeRouteFile();

        return "\n Done..";
    }

    function writeRouteFile()
    {
        $template_file_path = ROOT.'templates/xml/front-router.tpl';
        $output_file_path = $this->helper->getModuleBasePath().'etc/frontend/routes.xml';

        $template_file_contents = file_get_contents($template_file_path);
        $data = array(
            'package_name'=>$this->package_name,
            'module_name'=>$this->module_name,
            'front_name'=>$this->front_name
        );

        $output_file_contents = $this->helper->replacePlaceHolders($template_file_contents, $data);

        $this->helper->writeCodeFile($output_file_path, $output_file_contents);
    }

}