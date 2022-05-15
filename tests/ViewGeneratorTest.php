<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\Filters\CITestStreamFilter;

/**
* --------------------------------------------------------------------------
* CodeIgniter Spark Plus ViewGeneratorTest.
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
final class ViewGeneratorTest extends CIUnitTestCase
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

    public function testGenerateView(): void
    {
        command('make:view view_file_name');
        $filepath = APPPATH .'Views/view_file_name.php';

        $this->assertStringContainsString('File created: ', CITestStreamFilter::$buffer);
        $this->assertFileExists($filepath);
        $this->assertStringContainsString(config('SparkPlus')->comment['text_in_view_file'], $this->getFileContents($filepath));

    }

    public function testGenerateViewCustomNamespace(): void
    {
        command('make:view view_file_name --namespace Datamweb\\\\SparkPlus');
        $filepath = APPPATH .'ThirdParty/codeIgniter-spark-plus/src/Views/view_file_name.php';

        $this->assertStringContainsString('File created: ', CITestStreamFilter::$buffer);
        $this->assertFileExists($filepath);
        $this->assertStringContainsString(config('SparkPlus')->comment['text_in_view_file'], $this->getFileContents($filepath));

    }

    public function testGenerateViewSubFolderMyFolder(): void
    {
        command('make:view view_file_name --sub-folder MyFolder');
        $filepath = APPPATH .'Views/MyFolder/view_file_name.php';

        $this->assertStringContainsString('File created: ', CITestStreamFilter::$buffer);
        $this->assertFileExists($filepath);
        $this->assertStringContainsString(config('SparkPlus')->comment['text_in_view_file'], $this->getFileContents($filepath));
           
    }

    public function testGenerateViewSubFolderMyFolderViaCustomNamespace(): void
    {
        command('make:view view_file_name --sub-folder MyFolder --namespace Datamweb\\\\SparkPlus');
        $filepath = APPPATH .'ThirdParty/codeIgniter-spark-plus/src/Views/MyFolder/view_file_name.php';

        $this->assertStringContainsString('File created: ', CITestStreamFilter::$buffer);
        $this->assertFileExists($filepath);
        $this->assertStringContainsString(config('SparkPlus')->comment['text_in_view_file'], $this->getFileContents($filepath));
           
    }    
}
