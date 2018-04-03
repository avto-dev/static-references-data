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
    public function testFileStricture()
    {
        foreach ($this->getReferenceContent() as $item) {
            $this->assertArrayHasKey('description', $item);
            $this->assertInternalType('string', $item['description']);

            $this->assertArrayHasKey('codes', $item);
            $this->assertInternalType('array', $item['codes']);

            foreach ($item['codes'] as $reg_action_code) {
                $this->assertInternalType('int', $reg_action_code);
            }
        }
    }

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

    /**
     * {@inheritdoc}
     */
    protected function getReferenceContent()
    {
        return $this->instance->getRegistrationActions()->getContent();
    }

    /**
     * {@inheritdoc}
     */
    protected function getExpectedEntityCount()
    {
        return 74;
    }

    /**
     * {@inheritdoc}
     */
    protected function getEntities()
    {
        return [
            [
                'codes'       => [
                    11,
                ],
                'description' => 'Первичная регистрация',
            ],
            [
                'codes'       => [
                    12,
                ],
                'description' => 'Регистрация снятого с учета ТС',
            ],
            [
                'codes'       => [
                    94,
                ],
                'description' => 'Изменение собственника по сделкам, произведенным в любой форме с сохранением государственных регистрационных знаков',
            ],
        ];
    }
}
