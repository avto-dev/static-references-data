<?php

declare(strict_types = 1);

namespace AvtoDev\StaticReferencesData\Tests\DataFiles;

class RegistrationActionsDataFileTest extends AbstractDataFilesTest
{
    /**
     * {@inheritdoc}
     */
    public function testFileStricture(): void
    {
        foreach ($this->getReferenceContent(true) as $item) {
            $this->assertArrayHasKey('description', $item);
            $this->assertIsString($item['description']);

            $this->assertArrayHasKey('codes', $item);
            $this->assertIsArray($item['codes']);

            foreach ($item['codes'] as $reg_action_code) {
                $this->assertIsInt($reg_action_code);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function getReferenceContent(bool $as_array): array
    {
        return $this->instance::getRegistrationActions()->getContent($as_array);
    }

    /**
     * {@inheritdoc}
     */
    protected function getDirectoryPath(): string
    {
        return $this->getRootDirPath() . '/data/registration_actions';
    }

    /**
     * {@inheritdoc}
     */
    protected function getFilePath(): string
    {
        return $this->getRootDirPath() . '/data/registration_actions/registration_actions.json';
    }

    /**
     * {@inheritdoc}
     */
    protected function getExpectedEntityCount(): int
    {
        return 74;
    }

    /**
     * {@inheritdoc}
     */
    protected function getEntities(): array
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
