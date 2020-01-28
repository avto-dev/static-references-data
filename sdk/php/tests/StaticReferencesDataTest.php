<?php

declare(strict_types = 1);

namespace AvtoDev\StaticReferencesData\Tests;

use InvalidArgumentException;
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
    public function setUp(): void
    {
        parent::setUp();

        $this->instance = new StaticReferencesData;
    }

    /**
     * @return void
     */
    public function testGetRootDirectoryPath(): void
    {
        $this->assertEquals($this->instance::getRootDirectoryPath(), $root = $this->getRootDirPath());
        $this->assertEquals($this->instance::getRootDirectoryPath('foo'), $root . DIRECTORY_SEPARATOR . 'foo');
        $this->assertEquals($this->instance::getRootDirectoryPath(' /foo'), $root . DIRECTORY_SEPARATOR . 'foo');
    }

    /**
     * @return void
     */
    public function testGetAutoCategories(): void
    {
        $this->assertEquals(
            \json_decode(
                \file_get_contents($this->instance::getRootDirectoryPath(
                    '/data/auto_categories/auto_categories.json'
                )),
                true
            ),
            $this->instance::getAutoCategories()->getContent()
        );
    }

    /**
     * @return void
     */
    public function testGetAutoCategoriesWithInvalidFileName(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->instance::getAutoCategories('foo bar');
    }

    /**
     * @return void
     */
    public function testGetAutoRegions(): void
    {
        $this->assertEquals(
            \json_decode(
                \file_get_contents($this->instance::getRootDirectoryPath(
                    '/data/auto_regions/auto_regions.json'
                )),
                true
            ),
            $this->instance::getAutoRegions()->getContent()
        );
    }

    /**
     * @return void
     */
    public function testGetAutoRegionsWithInvalidFileName(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->instance::getAutoRegions('foo bar');
    }

    /**
     * @return void
     */
    public function testGetRegistrationActions(): void
    {
        $this->assertEquals(
            \json_decode(
                \file_get_contents($this->instance::getRootDirectoryPath(
                    '/data/registration_actions/registration_actions.json'
                )),
                true
            ),
            $this->instance::getRegistrationActions()->getContent()
        );
    }

    /**
     * @return void
     */
    public function testGetRegistrationActionsWithInvalidFileName(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->instance::getRegistrationActions('foo bar');
    }

    /**
     * @return void
     */
    public function testGetRepairMethods(): void
    {
        $this->assertEquals(
            \json_decode(
                \file_get_contents($this->instance::getRootDirectoryPath(
                    '/data/repair_methods/repair_methods.json'
                )),
                true
            ),
            $this->instance::getRepairMethods()->getContent()
        );
    }

    /**
     * @return void
     */
    public function testGetRepairMethodsWithInvalidFileName(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->instance::getRepairMethods('foo bar');
    }

    /**
     * @return void
     */
    public function testGetAutoFines(): void
    {
        $this->assertEquals(
            \json_decode(
                \file_get_contents($this->instance::getRootDirectoryPath(
                    '/data/auto_fines/auto_fines.json'
                )),
                true
            ),
            $this->instance::getAutoFines()->getContent()
        );
    }

    /**
     * @return void
     */
    public function testGetAutoFinesWithInvalidFileName(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->instance::getAutoFines('foo bar');
    }

    /**
     * @return void
     */
    public function testGetVehicleTypes(): void
    {
        $this->assertEquals(
            \json_decode(
                \file_get_contents($this->instance::getRootDirectoryPath(
                    '/data/vehicle_types/vehicle_types.json'
                )),
                true
            ),
            $this->instance::getVehicleTypes()->getContent()
        );
    }

    /**
     * @return void
     */
    public function testGetVehicleTypesWithInvalidFileName(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->instance::getVehicleTypes('foo bar');
    }

    /**
     * @return void
     */
    public function testGetCadastralDistricts(): void
    {
        $this->assertEquals(
            \json_decode(
                \file_get_contents($this->instance::getRootDirectoryPath(
                    '/data/cadastral_districts/cadastral_districts.json'
                )),
                true
            ),
            $this->instance::getCadastralDistricts()->getContent()
        );
    }

    /**
     * @return void
     */
    public function testGetCadastralDistrictsWithInvalidFileName(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->instance::getVehicleTypes('foo bar');
    }
}
