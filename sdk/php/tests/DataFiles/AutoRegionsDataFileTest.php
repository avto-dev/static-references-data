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
}
