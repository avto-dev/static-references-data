<?php

namespace AvtoDev\StaticReferencesData\Tests\DataFiles;

/**
 * Class AutoCategoriesDataFileTest.
 *
 * Auto categories file test.
 */
class AutoCategoriesDataFileTest extends AbstractDataFilesTest
{
    /**
     * {@inheritdoc}
     */
    public function testFileStricture()
    {
        foreach ($this->getReferenceContent() as $item) {
            $this->assertArrayHasKey('code', $item);
            $this->assertInternalType('string', $item['code']);

            $this->assertArrayHasKey('description', $item);
            $this->assertInternalType('string', $item['description']);
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function getDirectoryPath()
    {
        return $this->getRootDirPath() . '/data/auto_categories';
    }

    /**
     * {@inheritdoc}
     */
    protected function getFilePath()
    {
        return $this->getRootDirPath() . '/data/auto_categories/auto_categories.json';
    }

    /**
     * {@inheritdoc}
     */
    protected function getReferenceContent()
    {
        return $this->instance->getAutoCategories()->getContent();
    }

    /**
     * {@inheritdoc}
     */
    protected function getExpectedEntityCount()
    {
        return 16;
    }

    /**
     * {@inheritdoc}
     */
    protected function getEntities()
    {
        return [
            [
                "code"        => "A",
                "description" => "Мотоциклы",
            ],
            [
                "code"        => "A1",
                "description" => "Легкие мотоциклы",
            ],
            [
                "code"        => "TB",
                "description" => "Троллейбусы",

            ],
        ];
    }
}
