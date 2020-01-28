<?php

declare(strict_types = 1);

namespace AvtoDev\StaticReferencesData\Tests\DataFiles;

class AutoFinesDataFileTest extends AbstractDataFilesTest
{
    /**
     * {@inheritdoc}
     */
    public function testFileStricture(): void
    {
        foreach ($this->getReferenceContent(true) as $item) {
            $this->assertArrayHasKey('description', $item);
            $this->assertIsString($item['description']);

            $this->assertArrayHasKey('article', $item);
            $this->assertIsString($item['article']);
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function getReferenceContent(bool $as_array): array
    {
        return $this->instance::getAutoFines()->getContent($as_array);
    }

    /**
     * {@inheritdoc}
     */
    protected function getDirectoryPath(): string
    {
        return $this->getRootDirPath() . '/data/auto_fines';
    }

    /**
     * {@inheritdoc}
     */
    protected function getFilePath(): string
    {
        return $this->getRootDirPath() . '/data/auto_fines/auto_fines.json';
    }

    /**
     * {@inheritdoc}
     */
    protected function getExpectedEntityCount(): int
    {
        return 179;
    }

    /**
     * {@inheritdoc}
     */
    protected function getEntities(): array
    {
        return [
            [
                'article'     => '11.21 Ч.1',
                'description' => 'Загрязнение полос отвода и придорожных полос автомобильных дорог [...]',
            ],
            [
                'article'     => '11.23 Ч.2',
                'description' => 'Нарушение лицом, управляющим транспортным средством для перевозки грузов и (или) пассажиров, установленного режима труда и отдыха',
            ],
            [
                'article'     => '12.32.1',
                'description' => 'Допуск к управлению транспортным средством водителя, не имеющего в случаях, предусмотренных законодательством Российской Федерации о безопасности дорожного движения, российского национального водительского удостоверения',
            ],
            [
                'article'     => '8.23',
                'description' => 'Эксплуатация не гражданами воздушных или морских судов, судов внутреннего водного плавания или маломерных судов либо автомобилей, мотоциклов или других механических транспортных средств, у которых содержание загрязняющих веществ в выбросах либо уровень шума, производимого ими при работе, превышает нормативы, установленные государственными стандартами Российской Федерации',
            ],
        ];
    }
}
