<?php

namespace AvtoDev\StaticReferencesData\Tests\DataFiles;

/**
 * Class RepairMethodsDataFileTest.
 *
 * Repair methods file test.
 */
class RepairMethodsDataFileTest extends AbstractDataFilesTest
{
    /**
     * {@inheritdoc}
     */
    public function testFileStricture()
    {
        foreach ($this->getReferenceContent() as $item) {
            $this->assertArrayHasKey('description', $item);
            $this->assertTrue(is_string($item['description']));

            $this->assertArrayHasKey('codes', $item);
            $this->assertInternalType('array', $item['codes']);

            foreach ($item['codes'] as $repair_method_code) {
                $this->assertInternalType('string', $repair_method_code);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function getDirectoryPath()
    {
        return $this->getRootDirPath() . '/data/repair_methods';
    }

    /**
     * {@inheritdoc}
     */
    protected function getFilePath()
    {
        return $this->getRootDirPath() . '/data/repair_methods/repair_methods.json';
    }

    /**
     * {@inheritdoc}
     */
    protected function getReferenceContent()
    {
        return $this->instance->getRepairMethods()->getContent();
    }

    /**
     * {@inheritdoc}
     */
    protected function getExpectedEntityCount()
    {
        return 19;
    }

    /**
     * {@inheritdoc}
     */
    protected function getEntities()
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
