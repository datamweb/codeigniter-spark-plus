<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\Filters\CITestStreamFilter;

/**
* --------------------------------------------------------------------------
* CodeIgniter Spark Plus LibraryGeneratorTest.
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
 * @internal
 */
final class LibraryGeneratorTest extends CIUnitTestCase
{
    protected $streamFilter;

    protected function setUp(): void
    {
        CITestStreamFilter::$buffer = '';
        $this->streamFilter = stream_filter_append(STDOUT, 'CITestStreamFilter');
        $this->streamFilter = stream_filter_append(STDERR, 'CITestStreamFilter');
        parent::setUp();

    }

    protected function tearDown(): void
    {
        stream_filter_remove($this->streamFilter);
        $result = str_replace(["\033[0;32m", "\033[0m", "\n"], '', CITestStreamFilter::$buffer);
        $file   = str_replace('APPPATH' . DIRECTORY_SEPARATOR, APPPATH, trim(substr($result, 14)));

        if (is_file($file)) {
            unlink($file);
        }
    }

    protected function getFileContents(string $filepath): string
    {
        if (! file_exists($filepath)) {
            return '';
        }
        return file_get_contents($filepath) ?: '';
    }

    public function testGenerateLibrary(): void
    {
        command('make:lib MyLibName');
        $filepath = APPPATH .'Libraries/MyLibName.php';

        $this->assertStringContainsString('File created: ', CITestStreamFilter::$buffer);
        $this->assertFileExists($filepath);
        $this->assertStringContainsString(config('SparkPlus')->comment['text_in_lib_file'], $this->getFileContents($filepath));

    }

    public function testGenerateLibraryCustomNamespace(): void
    {
        command('make:lib MyLibName --namespace Datamweb\\\\SparkPlus');
        $filepath = APPPATH .'ThirdParty/codeIgniter-spark-plus/src/Libraries/MyLibName.php';

        $this->assertStringContainsString('File created: ', CITestStreamFilter::$buffer);
        $this->assertFileExists($filepath);
        $this->assertStringContainsString(config('SparkPlus')->comment['text_in_lib_file'], $this->getFileContents($filepath));

    }

    public function testGenerateLibrarySubFolderMyFolder(): void
    {
        command('make:lib MyFolder\\\\MyLibName');
        $filepath = APPPATH .'Libraries/MyFolder/MyLibName.php';

        $this->assertStringContainsString('File created: ', CITestStreamFilter::$buffer);
        $this->assertFileExists($filepath);
        $this->assertStringContainsString(config('SparkPlus')->comment['text_in_lib_file'], $this->getFileContents($filepath));
           
    }

    public function testGenerateLibrarySubFolderMyFolderViaCustomNamespace(): void
    {
        command('make:lib MyFolder\\\\MyLibName --namespace Datamweb\\\\SparkPlus');
        $filepath = APPPATH .'ThirdParty/codeIgniter-spark-plus/src/Libraries/MyFolder/MyLibName.php';

        $this->assertStringContainsString('File created: ', CITestStreamFilter::$buffer);
        $this->assertFileExists($filepath);
        $this->assertStringContainsString(config('SparkPlus')->comment['text_in_lib_file'], $this->getFileContents($filepath));
           
    }      
}