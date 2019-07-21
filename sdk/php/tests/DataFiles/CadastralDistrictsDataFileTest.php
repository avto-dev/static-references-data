<?php

namespace AvtoDev\StaticReferencesData\Tests\DataFiles;

/**
 * Class CadastralDistrictsDataFileTest.
 *
 * Cadastral districts file test.
 */
class CadastralDistrictsDataFileTest extends AbstractDataFilesTest
{
    /**
     * {@inheritdoc}
     */
    public function testFileStricture()
    {
        foreach ($this->getReferenceContent() as $item) {
            $this->assertArrayHasKey('code', $item);
            $this->assertInternalType('string', $item['code']);

            $this->assertArrayHasKey('name', $item);
            $this->assertInternalType('string', $item['name']);

            $this->assertArrayHasKey('districts', $item);
            $this->assertInternalType('array', $item['districts']);
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function getDirectoryPath()
    {
        return $this->getRootDirPath() . '/data/cadastral_districts';
    }

    /**
     * {@inheritdoc}
     */
    protected function getFilePath()
    {
        return $this->getRootDirPath() . '/data/cadastral_districts/cadastral_districts.json';
    }

    /**
     * {@inheritdoc}
     */
    protected function getReferenceContent()
    {
        $instance = $this->instance; // PHP 5.6

        return $instance::getCadastralDistricts()->getContent();
    }

    /**
     * {@inheritdoc}
     */
    protected function getExpectedEntityCount()
    {
        return 91;
    }

    /**
     * {@inheritdoc}
     */
    protected function getEntities()
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
