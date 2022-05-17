<?php

namespace Datamweb\SparkPlus\Commands\Generators;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Datamweb\SparkPlus\CLI\GeneratorTrait;

/**
 * Generates a skeleton Library file.
 */
class LibraryGenerator extends BaseCommand
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
    protected $name = 'make:lib';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Generates a new library file.';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = <<<'EOL'
                            make:lib [<library_name>] [options]'
                                
                            Examples:
                            make:lib YourClassName 
                            make:lib subfolde1/subfolder2/YourClassName 
                            make:lib YourClassName --namespace YourNameSpace 
                            EOL;

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [
        'library_name' => 'The library Class name.',
    ];

    /**
     * The Command's Options
     *
     * @var array
     */
    protected $options = [
        '--namespace' => 'Set root namespace. Default: "APP_NAMESPACE".',
    ];

    /**
     * Actually execute a command.
     *
     * @param array $params
     */
    public function run(array $params)
    {

        $this->component = 'Libraries';
        $this->directory = 'Libraries';
        $this->template  = 'library.tpl.php';

        $this->classNameLang = 'SparkPlus.generator.lib.libName';
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
        [config('SparkPlus')->comment['text_in_lib_file'],],
        [], 
        );
    }
}