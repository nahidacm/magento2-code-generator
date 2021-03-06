<?php
/**
 * https://magento2training.com
 * User: Mahmudur Rahman
 * Date: 24-09-16
 * Time: 06.13
 */


define('DS',DIRECTORY_SEPARATOR);

/** @const Magento installation path */
define('MAGENTO_ROOT', __DIR__ . DS.'..'.DS);
//define('MAGENTO_ROOT',__DIR__ . DS);

/** @const This mdule creator base path */
define('ROOT', __DIR__ . DS);

if (!isset($argv[1])) {
    echo " Command parameter missing...\n Please enter command name (e.g. GenerateModule): ";
    $line = trim(fgets(STDIN));
    $main_command = $line;
}else{
    $main_command = $argv[1];
}

$class_name = '\Commands\\' . $main_command;

$generate_module = new $class_name($argv);
echo $generate_module->execute();

function __autoload($classname)
{
    $namespace = substr($classname, 0, strrpos($classname, '\\'));
    $namespace = str_replace('\\', DS, $classname);
    $classPath = ROOT . str_replace('\\', '/', $namespace) . '.php';

    if (is_readable($classPath)) {
        require_once $classPath;
    }else{
        echo "\033[31m Command not found \033[0m \n";
        echo "Terminating...";
        exit;
    }
}
