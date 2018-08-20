<?php

namespace AvtoDev\StaticReferencesData\Tests\DataFiles;

/**
 * Auto fines file test.
 */
class AutoFinesDataFileTest extends AbstractDataFilesTest
{
    /**
     * {@inheritdoc}
     */
    public function testFileStricture()
    {
        foreach ($this->getReferenceContent() as $item) {
            $this->assertArrayHasKey('description', $item);
            $this->assertInternalType('string', $item['description']);

            $this->assertArrayHasKey('article', $item);
            $this->assertInternalType('string', $item['article']);
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function getDirectoryPath()
    {
        return $this->getRootDirPath() . '/data/auto_fines';
    }

    /**
     * {@inheritdoc}
     */
    protected function getFilePath()
    {
        return $this->getRootDirPath() . '/data/auto_fines/auto_fines.json';
    }

    /**
     * {@inheritdoc}
     */
    protected function getReferenceContent()
    {
        $instance = $this->instance; // PHP 5.6

        return $instance::getAutoFines()->getContent();
    }

    /**
     * {@inheritdoc}
     */
    protected function getExpectedEntityCount()
    {
        return 179;
    }

    /**
     * {@inheritdoc}
     */
    protected function getEntities()
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
