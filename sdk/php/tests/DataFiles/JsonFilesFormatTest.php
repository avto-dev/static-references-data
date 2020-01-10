<?php

namespace AvtoDev\StaticReferencesData\Tests\DataFiles;

use RegexIterator;
use RecursiveRegexIterator;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use AvtoDev\StaticReferencesData\Tests\AbstractTestCase;

class JsonFilesFormatTest extends AbstractTestCase
{
    /**
     * Тест корректности json-файлов.
     *
     * @return void
     */
    public function testJsonFilesFormat()
    {
        $root = $this->getRootDirPath();

        $exclude_directories = array_map('realpath', [
            $root . '/vendor',
            $root . '/sdk',
            $root . '/.git',
        ]);

        $directory = new RecursiveDirectoryIterator(realpath($root));
        $iterator  = new RecursiveIteratorIterator($directory);
        $regex     = new RegexIterator($iterator, '~^.+\.json$~i', RecursiveRegexIterator::GET_MATCH);
        $counter   = 0;

        foreach ($regex as $result) {
            foreach ($result as $file_path) {
                // Skip excluded directory
                foreach ($exclude_directories as $exclude_directory_path) {
                    if (mb_strpos($file_path, $exclude_directory_path) === 0) {
                        continue 2;
                    }
                }

                $this->assertJson(file_get_contents($file_path));
                $counter++;
            }
        }

        $this->assertGreaterThan(3, $counter);
    }
}
