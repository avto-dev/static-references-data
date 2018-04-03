<?php

namespace AvtoDev\StaticReferencesData\Tests\DataFiles;

/**
 * Class RegistrationActionsDataFileTest.
 *
 * Registration actions file test.
 */
class RegistrationActionsDataFileTest extends AbstractDataFilesTest
{
    /**
     * {@inheritdoc}
     */
    protected function getDirectoryPath()
    {
        return $this->getRootDirPath() . '/data/registration_actions';
    }

    /**
     * {@inheritdoc}
     */
    protected function getFilePath()
    {
        return $this->getRootDirPath() . '/data/registration_actions/registration_actions.json';
    }
}
