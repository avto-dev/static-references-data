<?php

declare(strict_types = 1);

namespace AvtoDev\StaticReferencesData\Tests;

use AvtoDev\StaticReferencesData\StaticReferencesData;

/**
 * @covers \AvtoDev\StaticReferencesData\StaticReferencesData
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
    public function testCadastralDistricts(): void
    {
        $this->assertEquals(
            \json_decode(
                \file_get_contents($this->instance::getRootDirectoryPath(
                    '/data/cadastral/districts.json'
                )),
                true
            ),
            $this->instance::cadastralDistricts()->getData()
        );
    }

    /**
     * @return void
     */
    public function testSubjectCodes(): void
    {
        $this->assertEquals(
            \json_decode(
                \file_get_contents($this->instance::getRootDirectoryPath(
                    '/data/subject/codes.json'
                )),
                true
            ),
            $this->instance::subjectCodes()->getData()
        );
    }

    /**
     * @return void
     */
    public function testVehicleFineArticles(): void
    {
        $this->assertEquals(
            \json_decode(
                \file_get_contents($this->instance::getRootDirectoryPath(
                    '/data/vehicle/fine/articles.json'
                )),
                true
            ),
            $this->instance::vehicleFineArticles()->getData()
        );
    }

    /**
     * @return void
     */
    public function testVehicleRegistrationActions(): void
    {
        $this->assertEquals(
            \json_decode(
                \file_get_contents($this->instance::getRootDirectoryPath(
                    '/data/vehicle/registration/actions.json'
                )),
                true
            ),
            $this->instance::vehicleRegistrationActions()->getData()
        );
    }

    /**
     * @return void
     */
    public function testVehicleRepairMethods(): void
    {
        $this->assertEquals(
            \json_decode(
                \file_get_contents($this->instance::getRootDirectoryPath(
                    '/data/vehicle/repair/methods.json'
                )),
                true
            ),
            $this->instance::vehicleRepairMethods()->getData()
        );
    }

    /**
     * @return void
     */
    public function testVehicleCategories(): void
    {
        $this->assertEquals(
            \json_decode(
                \file_get_contents($this->instance::getRootDirectoryPath(
                    '/data/vehicle/categories.json'
                )),
                true
            ),
            $this->instance::vehicleCategories()->getData()
        );
    }

    /**
     * @return void
     */
    public function testVehicleTypes(): void
    {
        $this->assertEquals(
            \json_decode(
                \file_get_contents($this->instance::getRootDirectoryPath(
                    '/data/vehicle/types.json'
                )),
                true
            ),
            $this->instance::vehicleTypes()->getData()
        );
    }
}
