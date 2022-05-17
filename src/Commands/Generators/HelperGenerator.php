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
 * Generates a skeleton helper file.
 */
class HelperGenerator extends BaseCommand
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
    protected $name = 'make:helper';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Generates a new helper file.';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = <<<'EOL'
                                make:helper [<helper_name>] [options]
                                
                                Examples:
                                make:helper 
                                make:helper my_helper_name 
                                make:helper my_helper_name --sub-folder subfolder1/subfolder2
                                make:helper my_helper_name --namespace YourNameSpace 
                                make:helper my_helper_name --namespace CodeIgniter 
                                make:helper my_helper_name --sub-folder subfolder1/subfolder2 --namespace YourNameSpace

                                EOL;

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [
        'helper_name' => 'The helper file name.',
    ];

    /**
     * The Command's Options
     *
     * @var array
     */
    protected $options = [
        '--namespace' => 'Set root namespace. Default: "APP_NAMESPACE".',
        '--sub-folder' => 'Sub folder, to create the helper in that folder.' 
    ];
    /**
     * Actually execute a command.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        $subFolder = '';
        if (array_key_exists('sub-folder', $params)) {
            $subFolder = $params['sub-folder'] ?? '';
        }

        $this->component = 'Helpers';
        $this->directory = "Helpers/$subFolder";
        $this->template  = 'helper.tpl.php';

        $this->classNameLang = 'SparkPlus.generator.helper.helperName';
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
        [config('SparkPlus')->comment['text_in_helper_file'],],
        [],
        );
    }  
}