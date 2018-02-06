<?php

namespace AvtoDev\StaticReferencesData\Tests;

use AvtoDev\StaticReferencesData\StaticReferencesData;
use Exception;

/**
 * Class StaticReferencesDataTest.
 */
class StaticReferencesDataTest extends AbstractTestCase
{
    /**
     * @var StaticReferencesData
     */
    protected $instance;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();

        $this->instance = new StaticReferencesData();
    }

    /**
     * Тест метода, возвращающего базовый путь к директории спецификаций.
     *
     * @return void
     */
    public function testGetRootDirectoryPath()
    {
        $this->assertEquals($this->instance->getRootDirectoryPath(), $root = $this->getRootDirPath());
        $this->assertEquals($this->instance->getRootDirectoryPath('foo'), $root.DIRECTORY_SEPARATOR.'foo');
        $this->assertEquals($this->instance->getRootDirectoryPath(' /foo'), $root.DIRECTORY_SEPARATOR.'foo');
        $this->assertEquals($this->instance->getRootDirectoryPath(new \stdClass()), $root);
        $this->assertEquals($this->instance->getRootDirectoryPath([]), $root);
    }

    /**
     * @return void
     */
    public function testGetAutoCategoriesData()
    {
        $this->assertEquals(
            json_decode(
                file_get_contents($this->instance->getRootDirectoryPath(
                    '/data/auto_categories/auto_categories.json'
                )),
                true
            ),
            $this->instance->getAutoCategoriesData()
        );
    }

    /**
     * @return void
     */
    public function testGetAutoCategoriesDataWithInvalidFileName()
    {
        $this->expectException(Exception::class);

        $this->instance->getAutoCategoriesData('foo bar');
    }

    /**
     * @return void
     */
    public function testGetAutoRegionsData()
    {
        $this->assertEquals(
            json_decode(
                file_get_contents($this->instance->getRootDirectoryPath(
                    '/data/auto_regions/auto_regions.json'
                )),
                true
            ),
            $this->instance->getAutoRegionsData()
        );
    }

    /**
     * @return void
     */
    public function testGetAutoRegionsDataWithInvalidFileName()
    {
        $this->expectException(Exception::class);

        $this->instance->getAutoRegionsData('foo bar');
    }

    /**
     * @return void
     */
    public function testGetRegistrationActionsData()
    {
        $this->assertEquals(
            json_decode(
                file_get_contents($this->instance->getRootDirectoryPath(
                    '/data/registration_actions/registration_actions.json'
                )),
                true
            ),
            $this->instance->getRegistrationActionsData()
        );
    }

    /**
     * @return void
     */
    public function testGetRegistrationActionsDataWithInvalidFileName()
    {
        $this->expectException(Exception::class);

        $this->instance->getRegistrationActionsData('foo bar');
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        unset($this->instance);

        parent::tearDown();
    }
}
