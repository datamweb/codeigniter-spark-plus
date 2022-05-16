<?php

namespace Datamweb\SparkPlus\Commands\Generators;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Datamweb\SparkPlus\CLI\GeneratorTrait;

/**
 * Generates a skeleton View file.
 */
class ViewGenerator extends BaseCommand
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
    protected $name = 'make:view';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Generates a new view file.';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = <<<'EOL'
                                make:view [<view_file_name>] [options]
                                
                                Examples:
                                make:view my_view_file 
                                make:view my_view_file --namespace YourNameSpace 
                                make:view my_view_file --sub-folder Panel/Admin
                                EOL;

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [
        'view_file_name' => 'The view file name.',
    ];

    /**
     * The Command's Options
     *
     * @var array
     */
    protected $options = [
        '--namespace' => 'Set root namespace. Default: "APP_NAMESPACE".',
        '--sub-folder' => 'sub folder, to create the view in that folder.' 
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

        $this->component = 'Views';
        $this->directory = "Views/$subFolder";
        $this->template  = 'view.tpl.php';

        $this->classNameLang = 'SparkPlus.generator.view.viewName';
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
        [config('SparkPlus')->comment['text_in_view_file'],],
        [],
        );
    }
}
