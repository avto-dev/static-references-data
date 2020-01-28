<?php

declare(strict_types = 1);

namespace AvtoDev\StaticReferencesData\Tests\DataFiles;

class AutoCategoriesDataFileTest extends AbstractDataFilesTest
{
    /**
     * {@inheritdoc}
     */
    public function testFileStricture(): void
    {
        foreach ($this->getReferenceContent(true) as $item) {
            $this->assertArrayHasKey('code', $item);
            $this->assertIsString($item['code']);

            $this->assertArrayHasKey('description', $item);
            $this->assertIsString($item['description']);
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function getReferenceContent(bool $as_array): array
    {
        return $this->instance::getAutoCategories()->getContent($as_array);
    }

    /**
     * {@inheritdoc}
     */
    protected function getDirectoryPath(): string
    {
        return $this->getRootDirPath() . '/data/auto_categories';
    }

    /**
     * {@inheritdoc}
     */
    protected function getFilePath(): string
    {
        return $this->getRootDirPath() . '/data/auto_categories/auto_categories.json';
    }

    /**
     * {@inheritdoc}
     */
    protected function getExpectedEntityCount(): int
    {
        return 16;
    }

    /**
     * {@inheritdoc}
     */
    protected function getEntities(): array
    {
        return [
            [
                'code'        => 'A',
                'description' => 'Мотоциклы',
            ],
            [
                'code'        => 'A1',
                'description' => 'Легкие мотоциклы',
            ],
            [
                'code'        => 'TB',
                'description' => 'Троллейбусы',
            ],
        ];
    }
}
