<?php

namespace Datamweb\SparkPlus\Commands\Generators;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Datamweb\SparkPlus\CLI\GeneratorTrait;

/**
* --------------------------------------------------------------------------
* CodeIgniter Spark Plus Commands.
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

/**
 * Generates a skeleton language file.
 */
class LangGenerator extends BaseCommand
{
    use GeneratorTrait;
    /**
     * The Command's Group
     *
     * @var string
     */
    protected $group = <<<'EOL'
  _________                   _      ____  _           
 / ________| _ __   __ _ _ __| | __ |  _ \| |_   _ ___ 
 \________ \| '_ \ / _` | '__| |/ / | |_) | | | | / __|
  ________) | |_) | (_| | |  |   <  |  __/| | |_| \__ \
 |v1.0.0___/| .__/ \__,_|_|  |_|\_\ |_|   |_|\__,_|___/                             
            | | More commands for CI4 command-line interface!
            |_|                                                                                                                 
EOL;

    /**
     * The Command's Name
     *
     * @var string
     */
    protected $name = 'make:lang';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Generates a new Language file.';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = <<<'EOL'
                                make:lang [<lang_file_name>] [options]'
                                
                                Examples:
                                make:lang MyLangFile --flag fa-IR
                                make:lang MyLangFile --namespace CodeIgniter 
                                make:lang MyLangFile --namespace YourNameSpace 
                                make:lang MyLangFile --flag fa-IR --namespace CodeIgniter
                                EOL;

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [
        'lang_file_name' => 'The Language file name.',
    ];

    /**
     * The Command's Options
     *
     * @var array
     */
    protected $options = [
        '--namespace' => 'Set root namespace. Default: "APP_NAMESPACE".',
        '--flag' => 'Language flag, to create the file in that folder. Default is : en' 
    ];

    /**
     * Actually execute a command.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        
        $flag = 'en';
        if (array_key_exists('flag', $params)) {
            $flag = $params['flag'] ?? 'en';
        }

        $this->component = 'Languags';
        $this->directory = "Language/$flag";
        $this->template  = 'lang.tpl.php';

        $this->classNameLang = 'SparkPlus.generator.lang.langName';
        $this->execute($params);
    }

    /**
     * Prepare options and do the necessary replacements.
     */
    protected function prepare(string $class): string
    {
        return $this->parseTemplate(
        $class,
        ['{comment}',],
        [config('SparkPlus')->comment['text_in_lang_file'],],
        [],
        );
    }
}
