<?php

declare(strict_types = 1);

namespace AvtoDev\StaticReferencesData\Tests\DataFiles;

use AvtoDev\StaticReferencesData\StaticReferencesData;
use AvtoDev\StaticReferencesData\Tests\AbstractTestCase;

abstract class AbstractDataFilesTest extends AbstractTestCase
{
    /**
     * @var StaticReferencesData
     */
    protected $instance;

    /**
     * {@inheritdoc}
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->instance = new StaticReferencesData;
    }

    /**
     * @return void
     */
    public function testDirectoriesStructure(): void
    {
        $root = $this->getRootDirPath();

        $directories = \array_map('\\realpath', [
            $root . '/data',
            $this->getDirectoryPath(),
        ]);

        foreach ($directories as $directory_path) {
            $this->assertDirectoryExists($directory_path);
            $this->assertDirectoryIsReadable($directory_path);
        }
    }

    /**
     * @return void
     */
    public function testFileExists(): void
    {
        $file = \realpath($this->getFilePath());

        $this->assertFileExists($file);
        $this->assertFileIsReadable($file);
    }

    /**
     * @return void
     */
    public function testGetContentAsObject(): void
    {
        foreach ($this->getReferenceContent(false) as $item) {
            $this->assertIsObject($item);
        }
    }

    /**
     * @return void
     */
    public function testGetContentAsArray(): void
    {
        foreach ($this->getReferenceContent(true) as $item) {
            $this->assertIsArray($item);
        }
    }

    /**
     * @return void
     */
    public function testEntityCount(): void
    {
        $this->assertGreaterThanOrEqual($this->getExpectedEntityCount(), \count($this->getReferenceContent(true)));
    }

    /**
     * @return void
     */
    public function testEntityPresents(): void
    {
        foreach ($this->getEntities() as $entity) {
            $this->assertContains($entity, $this->getReferenceContent(true));
        }
    }

    /**
     * @return void
     */
    abstract public function testFileStricture(): void;

    /**
     * @return string
     */
    abstract protected function getDirectoryPath(): string;

    /**
     * @return string
     */
    abstract protected function getFilePath(): string;

    /**
     * @return int
     */
    abstract protected function getExpectedEntityCount(): int;

    /**
     * @param bool $as_array
     *
     * @return array|object
     */
    abstract protected function getReferenceContent(bool $as_array);

    /**
     * @return array
     */
    abstract protected function getEntities(): array;
}
