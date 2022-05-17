<?php

namespace Datamweb\SparkPlus\Config;

use CodeIgniter\Config\BaseConfig;

/**
* --------------------------------------------------------------------------
* CodeIgniter Spark Plus Config.
* --------------------------------------------------------------------------
*
* @package         codeIgniter-spark-plus
* @collection      Best Datamweb Tools CI4(BDT-CI4)
* @author          Pooya Parsa Dadashi(@datamweb)
* @link            https://datamweb.ir
* @github_link     https://github.com/datamweb/codeIgniter-spark-plus
* @since           Version 1.0.0
* @datepublic      2022-05-15 | 1401/02/25
* 
*/

class SparkPlus extends BaseConfig
{

    public $views = [
        'make:lang'         => 'Datamweb\\SparkPlus\\Commands\\Generators\\Views\\lang.tpl.php',
        'make:view'         => 'Datamweb\\SparkPlus\\Commands\\Generators\\Views\\view.tpl.php',
        'make:helper'       => 'Datamweb\\SparkPlus\\Commands\\Generators\\Views\\helper.tpl.php',

    ];

    public $comment = [
        
        'text_in_lang_file' => <<<'EOL'
                                /**
                                 * This file was created by "Spark Plus".
                                 * Change this text through file "Config\SparkPlus.php".
                                 * Just change variable "text_in_lang_file".
                                 */
                                EOL,
        'text_in_view_file' => <<<'EOL'
                                <!--
                                 * This file was created by "Spark Plus".
                                 * Change this text through file "Config\SparkPlus.php".
                                 * Just change variable "text_in_view_file".
                                 -->
                                EOL,        
        'text_in_helper_file' => <<<'EOL'
                                /**
                                 * This file was created by "Spark Plus".
                                 * Change this text through file "Config\SparkPlus.php".
                                 * Just change variable "text_in_helper_file".
                                 */
                                EOL,        
                    
    ];
}
