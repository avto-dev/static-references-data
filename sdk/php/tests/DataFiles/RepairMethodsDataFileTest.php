<?php

declare(strict_types = 1);

namespace AvtoDev\StaticReferencesData\Tests\DataFiles;

class RepairMethodsDataFileTest extends AbstractDataFilesTest
{
    /**
     * {@inheritdoc}
     */
    public function testFileStricture(): void
    {
        foreach ($this->getReferenceContent(true) as $item) {
            $this->assertArrayHasKey('description', $item);
            $this->assertIsString($item['description']);

            $this->assertArrayHasKey('codes', $item);
            $this->assertIsArray($item['codes']);

            foreach ($item['codes'] as $repair_method_code) {
                $this->assertIsString($repair_method_code);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function getReferenceContent(bool $as_array): array
    {
        return $this->instance::getRepairMethods()->getContent($as_array);
    }

    /**
     * {@inheritdoc}
     */
    protected function getDirectoryPath(): string
    {
        return $this->getRootDirPath() . '/data/repair_methods';
    }

    /**
     * {@inheritdoc}
     */
    protected function getFilePath(): string
    {
        return $this->getRootDirPath() . '/data/repair_methods/repair_methods.json';
    }

    /**
     * {@inheritdoc}
     */
    protected function getExpectedEntityCount(): int
    {
        return 19;
    }

    /**
     * {@inheritdoc}
     */
    protected function getEntities(): array
    {
        return [
            [
                'codes'       => [
                    'E',
                ],
                'description' => 'Замена',
            ],
            [
                'codes'       => [
                    'ET',
                ],
                'description' => 'Частичная замена',
            ],
            [
                'codes'       => [
                    'S',
                ],
                'description' => 'Прочее',
            ],
        ];
    }
}
