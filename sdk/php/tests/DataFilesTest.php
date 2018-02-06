<?php

namespace AvtoDev\StaticReferencesData\Tests;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RecursiveRegexIterator;
use RegexIterator;

/**
 * Class DataFilesTest.
 */
class DataFilesTest extends AbstractTestCase
{
    /**
     * Тест структуры директорий.
     *
     * @return void
     */
    public function testDirectoriesStructure()
    {
        $root = $this->getRootDirPath();

        $directories = array_map('realpath', [
            $root.'/data',
            $root.'/data/auto_categories',
            $root.'/data/auto_regions',
            $root.'/data/registration_actions',
        ]);

        foreach ($directories as $directory_path) {
            $this->assertDirectoryExists($directory_path);
            $this->assertDirectoryIsReadable($directory_path);
        }
    }

    /**
     * Тест наличия файлов.
     *
     * @return void
     */
    public function testFilesStructure()
    {
        $root = $this->getRootDirPath();

        $files = array_map('realpath', [
            $root.'/data/auto_categories/auto_categories.json',
            $root.'/data/auto_regions/auto_regions.json',
            $root.'/data/registration_actions/registration_actions.json',
        ]);

        foreach ($files as $file) {
            $this->assertFileExists($file);
            $this->assertFileIsReadable($file);
        }
    }

    /**
     * Тест корректности json-файлов.
     *
     * @return void
     */
    public function testJsonFilesFormat()
    {
        $root = $this->getRootDirPath();

        $exclude_directories = array_map('realpath', [
            $root.'/vendor',
            $root.'/sdk',
            $root.'/.git',
        ]);

        $directory = new RecursiveDirectoryIterator(realpath($root));
        $iterator = new RecursiveIteratorIterator($directory);
        $regex = new RegexIterator($iterator, '~^.+\.json$~i', RecursiveRegexIterator::GET_MATCH);
        $counter = 0;

        foreach ($regex as $result) {
            foreach ($result as $file_path) {
                // Skip excluded directory
                foreach ($exclude_directories as $exclude_directory_path) {
                    if (strpos($file_path, $exclude_directory_path) === 0) {
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
