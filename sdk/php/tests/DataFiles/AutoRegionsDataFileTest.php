<?php

namespace AvtoDev\StaticReferencesData\Tests\DataFiles;

/**
 * Class AutoRegionsDataFileTest.
 *
 * Auto regions file test.
 */
class AutoRegionsDataFileTest extends AbstractDataFilesTest
{
    /**
     * {@inheritdoc}
     */
    public function testFileStricture()
    {
        foreach ($this->getReferenceContent() as $item) {
            $this->assertArrayHasKey('title', $item);
            $this->assertInternalType('string', $item['title']);

            $this->assertArrayHasKey('short', $item);
            $this->assertInternalType('array', $item['short']);

            foreach ($item['short'] as $short_name) {
                $this->assertInternalType('string', $short_name);
            }

            $this->assertArrayHasKey('code_iso_31662', $item);
            $this->assertInternalType('string', $item['code_iso_31662']);

            $this->assertArrayHasKey('type', $item);
            $this->assertInternalType('string', $item['type']);

            $this->assertArrayHasKey('code', $item);
            $this->assertInternalType('int', $item['code']);

            $this->assertArrayHasKey('okato', $item);
            $this->assertInternalType('string', $item['okato']);

            $this->assertArrayHasKey('gibdd', $item);
            $this->assertInternalType('array', $item['gibdd']);

            foreach ($item['gibdd'] as $gibdd_code) {
                $this->assertInternalType('int', $gibdd_code);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function getDirectoryPath()
    {
        return $this->getRootDirPath() . '/data/auto_regions';
    }

    /**
     * {@inheritdoc}
     */
    protected function getFilePath()
    {
        return $this->getRootDirPath() . '/data/auto_regions/auto_regions.json';
    }

    /**
     * {@inheritdoc}
     */
    protected function getReferenceContent()
    {
        $instance = $this->instance; // PHP 5.6

        return $instance::getAutoRegions()->getContent();
    }

    /**
     * {@inheritdoc}
     */
    protected function getExpectedEntityCount()
    {
        return 86;
    }

    /**
     * {@inheritdoc}
     */
    protected function getEntities()
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
