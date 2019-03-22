<?php

namespace AvtoDev\StaticReferencesData\Tests\DataFiles;

/**
 * Class VehicleTypesDataFileTest.
 *
 * Vehicle types file test.
 */
class VehicleTypesDataFileTest extends AbstractDataFilesTest
{
    /**
     * {@inheritdoc}
     */
    public function testFileStricture()
    {
        foreach ($this->getReferenceContent() as $item) {
            $this->assertArrayHasKey('code', $item);
            $this->assertInternalType('int', $item['code']);

            $this->assertArrayHasKey('title', $item);
            $this->assertInternalType('string', $item['title']);

            $this->assertArrayHasKey('group_title', $item);
            $this->assertInternalType('string', $item['group_title']);

            $this->assertArrayHasKey('group_slug', $item);
            $this->assertInternalType('string', $item['group_slug']);
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function getDirectoryPath()
    {
        return $this->getRootDirPath() . '/data/vehicle_types';
    }

    /**
     * {@inheritdoc}
     */
    protected function getFilePath()
    {
        return $this->getRootDirPath() . '/data/vehicle_types/vehicle_types.json';
    }

    /**
     * {@inheritdoc}
     */
    protected function getReferenceContent()
    {
        $instance = $this->instance; // PHP 5.6

        return $instance::getVehicleTypes()->getContent();
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
                'code'       => 22,
                'title'      => 'Комби (хетчбек)',
                'group_title'=> 'Легковые автомобили',
                'group_slug' => 'cars',
            ],
            [
                'code'       => 3,
                'title'      => 'Фургоны',
                'group_title'=> 'Грузовые автомобили',
                'group_slug' => 'trucks',
            ],
            [
                'code'       => 72,
                'title'      => 'Мотороллер и мотоколяска',
                'group_title'=> 'Мототранспорт',
                'group_slug' => 'mototransport',
            ],
        ];
    }
}
