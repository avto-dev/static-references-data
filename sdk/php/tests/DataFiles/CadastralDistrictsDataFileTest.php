<?php

declare(strict_types = 1);

namespace AvtoDev\StaticReferencesData\Tests\DataFiles;

class CadastralDistrictsDataFileTest extends AbstractDataFilesTest
{
    /**
     * {@inheritdoc}
     */
    public function testFileStricture(): void
    {
        foreach ($this->getReferenceContent(true) as $item) {
            $this->assertArrayHasKey('code', $item);
            $this->assertIsString($item['code']);

            $this->assertArrayHasKey('name', $item);
            $this->assertIsString($item['name']);

            $this->assertArrayHasKey('districts', $item);
            $this->assertIsArray($item['districts']);
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function getReferenceContent(bool $as_array)
    {
        return $this->instance::getCadastralDistricts()->getContent($as_array);
    }

    /**
     * {@inheritdoc}
     */
    protected function getDirectoryPath(): string
    {
        return $this->getRootDirPath() . '/data/cadastral_districts';
    }

    /**
     * {@inheritdoc}
     */
    protected function getFilePath(): string
    {
        return $this->getRootDirPath() . '/data/cadastral_districts/cadastral_districts.json';
    }

    /**
     * {@inheritdoc}
     */
    protected function getExpectedEntityCount(): int
    {
        return 91;
    }

    /**
     * {@inheritdoc}
     */
    protected function getEntities(): array
    {
        return [
            [
                'code'      => '01',
                'name'      => 'Адыгейский',
                'districts' => [
                    [
                        'code' => '01',
                        'name' => 'Гиагинский',
                    ],
                    [
                        'code' => '02',
                        'name' => 'Кошехабльский',
                    ],
                    [
                        'code' => '03',
                        'name' => 'Красногвардейский',
                    ],
                    [
                        'code' => '04',
                        'name' => 'Майкопский районный',
                    ],
                    [
                        'code' => '05',
                        'name' => 'Тахтамукайский',
                    ],
                    [
                        'code' => '06',
                        'name' => 'Теучежский',
                    ],
                    [
                        'code' => '07',
                        'name' => 'Шовгеновский',
                    ],
                    [
                        'code' => '08',
                        'name' => 'Майкопский городской',
                    ],
                    [
                        'code' => '09',
                        'name' => 'Адыгейский городской',
                    ],
                ],
            ],
        ];
    }
}
