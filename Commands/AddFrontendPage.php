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
class AddFrontendPage extends Command
{
    var $front_name;
    var $section_ucf;
    var $section_lc;
    var $action_ucf;
    var $action_lc;

    function execute()
    {
        $this->front_name = $this->params[4];
        $this->section_ucf = $this->params[5];
        $this->section_lc = strtolower($this->params[5]);
        $this->action_ucf = ucfirst($this->params[6]);
        $this->action_lc = strtolower($this->params[6]);

        $this->writeRouteFile();
        $this->writeControllerClass();
        $this->writeTemplateFile();
        $this->writeLayoutFile();

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
    function writeControllerClass()
    {
        $template_file_path = ROOT.'templates/php/front-controller.tpl';
        $output_file_path = $this->helper->getModuleBasePath().'Controller/'.$this->section_ucf.'/'.$this->action_ucf.'.php';

        $template_file_contents = file_get_contents($template_file_path);
        $data = array(
            'package_name'=>$this->package_name,
            'module_name'=>$this->module_name,
            'front_name'=>$this->front_name,
            'section_ucf'=>$this->section_ucf,
            'action_ucf'=>$this->action_ucf,
        );

        $output_file_contents = $this->helper->replacePlaceHolders($template_file_contents, $data);

        $this->helper->writeCodeFile($output_file_path, $output_file_contents);
    }
    function writeTemplateFile()
    {
        $template_file_path = ROOT.'templates/phtml/front-template.tpl';
        $output_file_path = $this->helper->getModuleBasePath().'view/frontend/templates/'.$this->section_ucf.'/'.$this->action_lc.'.phtml';

        $template_file_contents = file_get_contents($template_file_path);
        $data = array(
            'package_name'=>$this->package_name,
            'module_name'=>$this->module_name,
            'front_name'=>$this->front_name,
            'section_ucf'=>$this->section_ucf,
            'section_lc'=>$this->section_lc,
            'action_ucf'=>$this->action_ucf,
            'action_lc'=>$this->action_lc,
        );

        $output_file_contents = $this->helper->replacePlaceHolders($template_file_contents, $data);

        $this->helper->writeCodeFile($output_file_path, $output_file_contents);
    }
    function writeLayoutFile()
    {
        $template_file_path = ROOT.'templates/xml/front-layout.tpl';
        $output_file_path = $this->helper->getModuleBasePath().'view/frontend/layout/'.$this->front_name.'_'.$this->section_ucf.'_'.$this->action_ucf.'.xml';

        $template_file_contents = file_get_contents($template_file_path);
        $data = array(
            'package_name'=>$this->package_name,
            'module_name'=>$this->module_name,
            'front_name'=>$this->front_name,
            'section_ucf'=>$this->section_ucf,
            'section_lc'=>$this->section_lc,
            'action_ucf'=>$this->action_ucf,
            'action_lc'=>$this->action_lc,
        );

        $output_file_contents = $this->helper->replacePlaceHolders($template_file_contents, $data);

        $this->helper->writeCodeFile($output_file_path, $output_file_contents);
    }

}