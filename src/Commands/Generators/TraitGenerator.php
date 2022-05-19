<?php

namespace Datamweb\SparkPlus\Commands\Generators;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Datamweb\SparkPlus\CLI\GeneratorTrait;

/**
 * Generates a skeleton trait file.
 */
class TraitGenerator extends BaseCommand
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
    protected $name = 'make:trait';

    /**
     * The Command's Description
     *
     * @var string
     */
    protected $description = 'Generates a new trait file.';

    /**
     * The Command's Usage
     *
     * @var string
     */
    protected $usage = <<<'EOL'
                    make:trait [<trait_name>] [options]
                        
                    Examples:
                    make:trait  
                    make:trait MyTraitName 
                    make:trait subfolde1/subfolder2/MyTraitName 
                    make:trait MyTraitName --namespace YourNameSpace 
                    EOL;

    /**
     * The Command's Arguments
     *
     * @var array
     */
    protected $arguments = [
        'trait_name' => 'The trait name.',
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

        $this->component = 'Trait';
        $this->directory = 'Traits';
        $this->template  = 'trait.tpl.php';
        $this->classNameLang = 'SparkPlus.generator.trait.traitName';
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
        [config('SparkPlus')->comment['text_in_trait_file']],
        [],
        );
    }

    /**
     * Append the component title to the class name (e.g. MyTraitName => MyTraitNameTrait).
     */
    protected function getSuffixedName(string $class, string $component): string
    {
        if (! strripos($class, $component)) {
                $class .= ucfirst($component);
        }

        return $class;
    } 
}