<?php

namespace AvtoDev\StaticReferencesData\Tests\DataFiles;

use AvtoDev\StaticReferencesData\StaticReferencesData;
use AvtoDev\StaticReferencesData\Tests\AbstractTestCase;

/**
 * Class AbstractDataFilesTest.
 */
abstract class AbstractDataFilesTest extends AbstractTestCase
{
    /**
     * @var StaticReferencesData
     */
    protected $instance;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();

        $this->instance = new StaticReferencesData;
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        unset($this->instance);

        parent::tearDown();
    }

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
    public function testFileExists()
    {
        $file = realpath($this->getFilePath());

        $this->assertFileExists($file);
        $this->assertFileIsReadable($file);
    }

    /**
     * Тестируем колличество записей в справочнике.
     *
     * @return void
     */
    public function testEntityCount()
    {
        $this->assertGreaterThanOrEqual($this->getExpectedEntityCount(), count($this->getReferenceContent()));
    }

    /**
     * Проверяет что в справочнике есть значение.
     *
     * @return void
     */
    public function testEntityPresents()
    {
        foreach ($this->getEntities() as $entity) {
            $this->assertContains($entity, $this->getReferenceContent());
        }
    }

    /**
     * Проверяет структуру файлов.
     *
     * @return void
     */
    abstract public function testFileStricture();

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

    /**
     * Возвращает ожидаемое колличество записей в справочнике.
     *
     * @return int
     */
    abstract protected function getExpectedEntityCount();

    /**
     * Возвращает текущее колличество записей в справочнике.
     *
     * @return array
     */
    abstract protected function getReferenceContent();

    /**
     * Возвращает массив значений который должен присутствовать в справочнике.
     *
     * @return array
     */
    abstract protected function getEntities();
}
