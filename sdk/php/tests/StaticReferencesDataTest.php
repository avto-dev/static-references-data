<?php

namespace AvtoDev\StaticReferencesData\Tests;

use Exception;
use AvtoDev\StaticReferencesData\StaticReferencesData;

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

        $this->instance = new StaticReferencesData;
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
        $instance = $this->instance; // PHP 5.6

        $this->assertEquals($instance::getRootDirectoryPath(), $root = $this->getRootDirPath());
        $this->assertEquals($instance::getRootDirectoryPath('foo'), $root . DIRECTORY_SEPARATOR . 'foo');
        $this->assertEquals($instance::getRootDirectoryPath(' /foo'), $root . DIRECTORY_SEPARATOR . 'foo');
        $this->assertEquals($instance::getRootDirectoryPath(new \stdClass), $root);
        $this->assertEquals($instance::getRootDirectoryPath([]), $root);
    }

    /**
     * @return void
     */
    public function testGetAutoCategories()
    {
        $instance = $this->instance; // PHP 5.6

        $this->assertEquals(
            json_decode(
                file_get_contents($instance::getRootDirectoryPath(
                    '/data/auto_categories/auto_categories.json'
                )),
                true
            ),
            $instance::getAutoCategories()->getContent()
        );
    }

    /**
     * @return void
     */
    public function testGetAutoCategoriesWithInvalidFileName()
    {
        $instance = $this->instance; // PHP 5.6

        $this->expectException(Exception::class);

        $instance::getAutoCategories('foo bar');
    }

    /**
     * @return void
     */
    public function testGetAutoRegions()
    {
        $instance = $this->instance; // PHP 5.6

        $this->assertEquals(
            json_decode(
                file_get_contents($instance::getRootDirectoryPath(
                    '/data/auto_regions/auto_regions.json'
                )),
                true
            ),
            $instance::getAutoRegions()->getContent()
        );
    }

    /**
     * @return void
     */
    public function testGetAutoRegionsWithInvalidFileName()
    {
        $instance = $this->instance; // PHP 5.6

        $this->expectException(Exception::class);

        $instance::getAutoRegions('foo bar');
    }

    /**
     * @return void
     */
    public function testGetRegistrationActions()
    {
        $instance = $this->instance; // PHP 5.6

        $this->assertEquals(
            json_decode(
                file_get_contents($instance::getRootDirectoryPath(
                    '/data/registration_actions/registration_actions.json'
                )),
                true
            ),
            $instance::getRegistrationActions()->getContent()
        );
    }

    /**
     * @return void
     */
    public function testGetRegistrationActionsWithInvalidFileName()
    {
        $instance = $this->instance; // PHP 5.6

        $this->expectException(Exception::class);

        $instance::getRegistrationActions('foo bar');
    }

    /**
     * @return void
     */
    public function testGetRepairMethods()
    {
        $instance = $this->instance; // PHP 5.6

        $this->assertEquals(
            json_decode(
                file_get_contents($instance::getRootDirectoryPath(
                    '/data/repair_methods/repair_methods.json'
                )),
                true
            ),
            $instance::getRepairMethods()->getContent()
        );
    }

    /**
     * @return void
     */
    public function testGetRepairMethodsWithInvalidFileName()
    {
        $instance = $this->instance; // PHP 5.6

        $this->expectException(Exception::class);

        $instance::getRepairMethods('foo bar');
    }

    /**
     * @return void
     */
    public function testGetAutoFines()
    {
        $instance = $this->instance; // PHP 5.6

        $this->assertEquals(
            json_decode(
                file_get_contents($instance::getRootDirectoryPath(
                    '/data/auto_fines/auto_fines.json'
                )),
                true
            ),
            $instance::getAutoFines()->getContent()
        );
    }

    /**
     * @return void
     */
    public function testGetAutoFinesWithInvalidFileName()
    {
        $instance = $this->instance; // PHP 5.6

        $this->expectException(Exception::class);

        $instance::getAutoFines('foo bar');
    }

    /**
     * @return void
     */
    public function testGetVehicleTypes()
    {
        $instance = $this->instance; // PHP 5.6

        $this->assertEquals(
            json_decode(
                file_get_contents($instance::getRootDirectoryPath(
                    '/data/vehicle_types/vehicle_types.json'
                )),
                true
            ),
            $instance::getVehicleTypes()->getContent()
        );
    }

    /**
     * @return void
     */
    public function testGetVehicleTypesWithInvalidFileName()
    {
        $instance = $this->instance; // PHP 5.6

        $this->expectException(Exception::class);

        $instance::getVehicleTypes('foo bar');
    }

    /**
     * @return void
     */
    public function testGetCadastralDistricts()
    {
        $instance = $this->instance; // PHP 5.6

        $this->assertEquals(
            json_decode(
                file_get_contents($instance::getRootDirectoryPath(
                    '/data/cadastral_districts/cadastral_districts.json'
                )),
                true
            ),
            $instance::getCadastralDistricts()->getContent()
        );
    }

    /**
     * @return void
     */
    public function testGetCadastralDistrictsWithInvalidFileName()
    {
        $instance = $this->instance; // PHP 5.6

        $this->expectException(Exception::class);

        $instance::getVehicleTypes('foo bar');
    }
}
