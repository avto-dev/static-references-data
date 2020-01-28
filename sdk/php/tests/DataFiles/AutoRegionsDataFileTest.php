<?php

declare(strict_types = 1);

namespace AvtoDev\StaticReferencesData\Tests\DataFiles;

class AutoRegionsDataFileTest extends AbstractDataFilesTest
{
    /**
     * {@inheritdoc}
     */
    public function testFileStricture(): void
    {
        foreach ($this->getReferenceContent(true) as $item) {
            $this->assertArrayHasKey('title', $item);
            $this->assertIsString($item['title']);

            $this->assertArrayHasKey('short', $item);
            $this->assertIsArray($item['short']);

            foreach ($item['short'] as $short_name) {
                $this->assertIsString($short_name);
            }

            $this->assertArrayHasKey('code_iso_31662', $item);
            $this->assertIsString($item['code_iso_31662']);

            $this->assertArrayHasKey('type', $item);
            $this->assertIsString($item['type']);

            $this->assertArrayHasKey('code', $item);
            $this->assertIsInt($item['code']);

            $this->assertArrayHasKey('okato', $item);
            $this->assertIsString($item['okato']);

            $this->assertArrayHasKey('gibdd', $item);
            $this->assertIsArray($item['gibdd']);

            foreach ($item['gibdd'] as $gibdd_code) {
                $this->assertIsInt($gibdd_code);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function getReferenceContent(bool $as_array): array
    {
        return $this->instance::getAutoRegions()->getContent($as_array);
    }

    /**
     * {@inheritdoc}
     */
    protected function getDirectoryPath(): string
    {
        return $this->getRootDirPath() . '/data/auto_regions';
    }

    /**
     * {@inheritdoc}
     */
    protected function getFilePath(): string
    {
        return $this->getRootDirPath() . '/data/auto_regions/auto_regions.json';
    }

    /**
     * {@inheritdoc}
     */
    protected function getExpectedEntityCount(): int
    {
        return 86;
    }

    /**
     * {@inheritdoc}
     */
    protected function getEntities(): array
    {
        return [
            [
                'title'          => 'Республика Адыгея',
                'short'          => [
                    'Адыгея',
                ],
                'code'           => 1,
                'gibdd'          => [
                    1,
                ],
                'okato'          => '79',
                'code_iso_31662' => 'RU-AD',
                'type'           => 'Республика',
            ],
            [
                'title'          => 'Республика Алтай',
                'short'          => [
                    'Алтай',
                ],
                'code'           => 4,
                'gibdd'          => [
                    4,
                ],
                'okato'          => '84',
                'code_iso_31662' => 'RU-AL',
                'type'           => 'Республика',
            ],
            [
                'title'          => 'Байконур',
                'short'          => [
                    'Байконур',
                    'Ленинск',
                ],
                'code'           => 99,
                'gibdd'          => [
                    94,
                ],
                'okato'          => '55',
                'code_iso_31662' => 'KZ-BAY',
                'type'           => 'Город федерального значения',
            ],
        ];
    }
}
