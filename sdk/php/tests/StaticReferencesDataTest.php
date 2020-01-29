<?php

declare(strict_types = 1);

namespace AvtoDev\StaticReferencesData\Tests;

use InvalidArgumentException;
use Tarampampam\Wrappers\Json;
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
            $data = \json_decode(
                \file_get_contents($this->instance::getRootDirectoryPath(
                    '/data/auto_categories/auto_categories.json'
                )),
                true
            ),
            $this->instance::getAutoCategories()->getData()
        );

        $codes = [];

        foreach ($data as $datum) {
            $this->assertIsString($code = $datum['code']);
            $this->assertIsString($datum['description']);

            $this->assertNotContains($code, $codes, "Duplicated code found: {$code}");

            $codes[] = $code;
        }
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
            $data = \json_decode(
                \file_get_contents($this->instance::getRootDirectoryPath(
                    '/data/auto_regions/auto_regions.json'
                )),
                true
            ),
            $this->instance::getAutoRegions()->getData()
        );

        \usort($data, static function ($a, $b) {
            return $a['code'] <=> $b['code'];
        });

dd(file_put_contents(__DIR__ . '/out.json', Json::encode($data, JSON_UNESCAPED_UNICODE)));
        $codes = $gibdds = $okatos = $iso_31662s = [];

        foreach ($data as $datum) {
            $this->assertIsString($datum['title']);
            $this->assertIsArray($datum['short']);

            foreach ($datum['short'] as $item) {
                $this->assertIsString($item);
            }

            $this->assertIsInt($code = $datum['code']);
            $this->assertNotContains($code, $codes, "Duplicated code found: {$code}");
            $codes[] = $code;

            $this->assertIsArray($gibdd = $datum['gibdd']);

            foreach ($gibdd as $item) {
                $this->assertIsInt($item);
                $this->assertNotContains($item, $gibdds, "Duplicated gibdd code found: {$item}");
                $gibdds[] = $item;
            }

            $this->assertIsString($okato = $datum['okato']);
            $this->assertNotContains($okato, $okatos, "Duplicated OKATO code found: {$okato}");
            $okatos[] = $okato;

            $this->assertIsString($iso = $datum['code_iso_31662']);
            $this->assertNotContains($iso, $iso_31662s, "Duplicated ISO-31662 code found: {$iso}");
            $iso_31662s[] = $iso;

            $this->assertIsString($datum['type']);
        }
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
            $this->instance::getRegistrationActions()->getData()
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
            $this->instance::getRepairMethods()->getData()
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
            $this->instance::getAutoFines()->getData()
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
            $this->instance::getVehicleTypes()->getData()
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
    public function testGetCadastralRegions(): void
    {
        $this->assertEquals(
            \json_decode(
                \file_get_contents($this->instance::getRootDirectoryPath(
                    '/data/cadastral_regions/cadastral_regions.json'
                )),
                true
            ),
            $this->instance::getCadastralRegions()->getData()
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
