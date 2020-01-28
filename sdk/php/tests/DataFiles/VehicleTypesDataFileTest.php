<?php

declare(strict_types = 1);

namespace AvtoDev\StaticReferencesData\Tests\DataFiles;

class VehicleTypesDataFileTest extends AbstractDataFilesTest
{
    /**
     * {@inheritdoc}
     */
    public function testFileStricture(): void
    {
        foreach ($this->getReferenceContent(true) as $item) {
            $this->assertArrayHasKey('code', $item);
            $this->assertIsInt($item['code']);

            $this->assertArrayHasKey('title', $item);
            $this->assertIsString($item['title']);

            $this->assertArrayHasKey('group_title', $item);
            $this->assertIsString($item['group_title']);

            $this->assertArrayHasKey('group_slug', $item);
            $this->assertIsString($item['group_slug']);
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function getReferenceContent(bool $as_array): array
    {
        return $this->instance::getVehicleTypes()->getContent($as_array);
    }

    /**
     * {@inheritdoc}
     */
    protected function getDirectoryPath(): string
    {
        return $this->getRootDirPath() . '/data/vehicle_types';
    }

    /**
     * {@inheritdoc}
     */
    protected function getFilePath(): string
    {
        return $this->getRootDirPath() . '/data/vehicle_types/vehicle_types.json';
    }

    /**
     * {@inheritdoc}
     */
    protected function getExpectedEntityCount(): int
    {
        return 45;
    }

    /**
     * {@inheritdoc}
     */
    protected function getEntities(): array
    {
        return [
            [
                'code'        => 22,
                'title'       => 'Комби (хетчбек)',
                'group_title' => 'Легковые автомобили',
                'group_slug'  => 'cars',
            ],
            [
                'code'        => 3,
                'title'       => 'Фургоны',
                'group_title' => 'Грузовые автомобили',
                'group_slug'  => 'trucks',
            ],
            [
                'code'        => 72,
                'title'       => 'Мотороллер и мотоколяска',
                'group_title' => 'Мототранспорт',
                'group_slug'  => 'mototransport',
            ],
        ];
    }
}
