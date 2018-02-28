<?php

namespace AvtoDev\StaticReferencesData\Tests;

use Exception;
use AvtoDev\StaticReferencesData\StaticReferencesData;

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
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        unset($this->instance);

        parent::tearDown();
    }

    /**
     * Тест метода, возвращающего базовый путь к директории спецификаций.
     *
     * @return void
     */
    public function testGetRootDirectoryPath()
    {
        $this->assertEquals($this->instance->getRootDirectoryPath(), $root = $this->getRootDirPath());
        $this->assertEquals($this->instance->getRootDirectoryPath('foo'), $root . DIRECTORY_SEPARATOR . 'foo');
        $this->assertEquals($this->instance->getRootDirectoryPath(' /foo'), $root . DIRECTORY_SEPARATOR . 'foo');
        $this->assertEquals($this->instance->getRootDirectoryPath(new \stdClass()), $root);
        $this->assertEquals($this->instance->getRootDirectoryPath([]), $root);
    }

    /**
     * @deprecated 2.0.0 No longer used by internal code and not recommended.
     *
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
     * @deprecated 2.0.0 No longer used by internal code and not recommended.
     *
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
    public function testGetAutoCategories()
    {
        $this->assertEquals(
            json_decode(
                file_get_contents($this->instance->getRootDirectoryPath(
                    '/data/auto_categories/auto_categories.json'
                )),
                true
            ),
            $this->instance->getAutoCategories()->getContent()
        );
    }

    /**
     * @return void
     */
    public function testGetAutoCategoriesWithInvalidFileName()
    {
        $this->expectException(Exception::class);

        $this->instance->getAutoCategories('foo bar');
    }

    /**
     * @deprecated 2.0.0 No longer used by internal code and not recommended.
     *
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
    public function testGetAutoRegions()
    {
        $this->assertEquals(
            json_decode(
                file_get_contents($this->instance->getRootDirectoryPath(
                    '/data/auto_regions/auto_regions.json'
                )),
                true
            ),
            $this->instance->getAutoRegions()->getContent()
        );
    }

    /**
     * @deprecated 2.0.0 No longer used by internal code and not recommended.
     *
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
    public function testGetAutoRegionsWithInvalidFileName()
    {
        $this->expectException(Exception::class);

        $this->instance->getAutoRegions('foo bar');
    }

    /**
     * @deprecated 2.0.0 No longer used by internal code and not recommended.
     *
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
    public function testGetRegistrationActions()
    {
        $this->assertEquals(
            json_decode(
                file_get_contents($this->instance->getRootDirectoryPath(
                    '/data/registration_actions/registration_actions.json'
                )),
                true
            ),
            $this->instance->getRegistrationActions()->getContent()
        );
    }

    /**
     * @deprecated 2.0.0 No longer used by internal code and not recommended.
     *
     * @return void
     */
    public function testGetRegistrationActionsDataWithInvalidFileName()
    {
        $this->expectException(Exception::class);

        $this->instance->getRegistrationActionsData('foo bar');
    }

    /**
     * @return void
     */
    public function testGetRegistrationActionsWithInvalidFileName()
    {
        $this->expectException(Exception::class);

        $this->instance->getRegistrationActions('foo bar');
    }
}
