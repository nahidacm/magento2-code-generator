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
class GenerateModule
{
    function execute($argv)
    {
        foreach ($argv as $i=>$arg )
        {
            echo $i.'. '.$arg."\n";
        }

//        echo "Are you sure you want to do this?  Type 'yes' to continue: ";
//        $line = trim(fgets(STDIN));
//        echo $line;

        return "\n Done..";
    }
}