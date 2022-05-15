<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\Filters\CITestStreamFilter;

/**
* --------------------------------------------------------------------------
* CodeIgniter Spark Plus LangGeneratorTest.
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
final class LangGeneratorTest extends CIUnitTestCase
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

    public function testGenerateLang(): void
    {
        command('make:lang LangFileName');
        $filepath = APPPATH .'Language/en/LangFileName.php';

        $this->assertStringContainsString('File created: ', CITestStreamFilter::$buffer);
        $this->assertFileExists($filepath);
        $this->assertStringContainsString(config('SparkPlus')->comment['text_in_lang_file'], $this->getFileContents($filepath));

    }

    public function testGenerateLangCustomNamespace(): void
    {
        command('make:lang LangFileName --namespace Datamweb\\\\SparkPlus');
        $filepath = APPPATH .'ThirdParty/codeIgniter-spark-plus/src/Language/en/LangFileName.php';

        $this->assertStringContainsString('File created: ', CITestStreamFilter::$buffer);
        $this->assertFileExists($filepath);
        $this->assertStringContainsString(config('SparkPlus')->comment['text_in_lang_file'], $this->getFileContents($filepath));

    }

    public function testGenerateLangNamespaceApp(): void
    {
        command('make:lang LangFileName');
        $filepath = APPPATH .'Language/en/LangFileName.php';

        $this->assertStringContainsString('File created: ', CITestStreamFilter::$buffer);
        $this->assertFileExists($filepath);
        $this->assertStringContainsString(config('SparkPlus')->comment['text_in_lang_file'], $this->getFileContents($filepath));

    }

    public function testGenerateLangFlagFa(): void
    {
        command('make:lang LangFileName --flag fa');
        $filepath = APPPATH .'Language/fa/LangFileName.php';

        $this->assertStringContainsString('File created: ', CITestStreamFilter::$buffer);
        $this->assertFileExists($filepath);
        $this->assertStringContainsString(config('SparkPlus')->comment['text_in_lang_file'], $this->getFileContents($filepath));
           
    }

    public function testGenerateLangFlagFaViaCustomNamespace(): void
    {
        command('make:lang LangFileName --flag fa --namespace Datamweb\\\\SparkPlus');
        $filepath = APPPATH .'ThirdParty/codeIgniter-spark-plus/src/Language/fa/LangFileName.php';

        $this->assertStringContainsString('File created: ', CITestStreamFilter::$buffer);
        $this->assertFileExists($filepath);
        $this->assertStringContainsString(config('SparkPlus')->comment['text_in_lang_file'], $this->getFileContents($filepath));
           
    }    
}
