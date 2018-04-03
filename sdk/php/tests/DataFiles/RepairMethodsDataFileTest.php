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
}
