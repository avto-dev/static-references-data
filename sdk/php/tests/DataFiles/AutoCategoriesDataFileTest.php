<?php

namespace AvtoDev\StaticReferencesData\Tests\DataFiles;

/**
 * Class AutoCategoriesDataFileTest.
 *
 * Auto categories file test.
 */
class AutoCategoriesDataFileTest extends AbstractDataFilesTest
{
    /**
     * {@inheritdoc}
     */
    protected function getDirectoryPath()
    {
        return $this->getRootDirPath() . '/data/auto_categories';
    }

    /**
     * {@inheritdoc}
     */
    protected function getFilePath()
    {
        return $this->getRootDirPath() . '/data/auto_categories/auto_categories.json';
    }
}
