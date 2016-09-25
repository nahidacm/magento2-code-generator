<?php
/**
 * https://magento2training.com
 * User: Mahmudur Rahman
 * Date: 25-09-16
 * Time: 11.45
 */

namespace Commands;


class help extends Command
{
    function execute()
    {
        $help_text = <<<HELP_TEXT
\e[33m Command List:
\e[36m php creator.php GenerateModule \e[35m PackageName ModuleName
\e[36m php creator.php AddFrontendPage \e[35m PackageName ModuleName front-name ControllerName ActionName

HELP_TEXT;

        echo $help_text."\n";
    }
}