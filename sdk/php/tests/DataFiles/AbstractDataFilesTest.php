<?php

namespace AvtoDev\StaticReferencesData\Tests\DataFiles;

use AvtoDev\StaticReferencesData\Tests\AbstractTestCase;

/**
 * Class AbstractDataFilesTest.
 */
abstract class AbstractDataFilesTest extends AbstractTestCase
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
            $root . '/data',
            $this->getDirectoryPath(),
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
        $file = realpath($this->getFilePath());

        $this->assertFileExists($file);
        $this->assertFileIsReadable($file);
    }

    /**
     * Получить путь до дериктории в которой лежит файл.
     *
     * @return string
     */
    abstract protected function getDirectoryPath();

    /**
     * Получить путь до файла справочника.
     *
     * @return string
     */
    abstract protected function getFilePath();
}
