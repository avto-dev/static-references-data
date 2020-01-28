<?php

declare(strict_types = 1);

namespace AvtoDev\StaticReferencesData\Tests;

/**
 * @coversNothing
 */
class DataFilesTest extends AbstractTestCase
{
    /**
     * @return void
     */
    public function testFilesWithOwnDataStructure(): void
    {
        foreach ($this->expectedFilesWithStructures() as $path => $structure) {
            $this->assertFileExists($path);

            $content_as_array = \json_decode(\file_get_contents($path), true);

            $this->assertArrayStructure($structure, $content_as_array);
        }
    }

    /**
     * @return array<string,array>
     */
    protected function expectedFilesWithStructures(): array
    {
        $data_path = $this->getRootDirPath() . '/data/';

        return [
            "{$data_path}/auto_categories/auto_categories.json" => [
                '*' => ['code', 'description'],
            ],
            "{$data_path}/auto_fines/auto_fines.json" => [
                '*' => ['article', 'description'],
            ],
            "{$data_path}/auto_regions/auto_regions.json" => [
                '*' => ['title', 'short', 'code', 'gibdd', 'okato', 'code_iso_31662', 'type'],
            ],
            "{$data_path}/cadastral_districts/cadastral_districts.json" => [
                '*' => ['code', 'name', 'districts' => ['*' => ['code', 'name']]],
            ],
            "{$data_path}/registration_actions/registration_actions.json" => [
                '*' => ['codes', 'description'],
            ],
            "{$data_path}/repair_methods/repair_methods.json" => [
                '*' => ['codes', 'description'],
            ],
            "{$data_path}/vehicle_types/vehicle_types.json" => [
                '*' => ['code', 'title', 'group_title', 'group_slug'],
            ],
        ];
    }

    /**
     * Assert that the array has a given structure.
     *
     * @link <https://github.com/avto-dev/dev-tools/blob/master/src/Tests/PHPUnit/Traits/AdditionalAssertionsTrait.php>
     *
     * @param array $structure
     * @param array $testing_array
     *
     * @return void
     */
    protected function assertArrayStructure(array $structure, $testing_array): void
    {
        foreach ($structure as $key => $value) {
            if (\is_array($value)) {
                if ($key === '*') {
                    $this->assertIsArray($testing_array);

                    foreach ($testing_array as $item) {
                        $this->assertArrayStructure($structure['*'], $item);
                    }
                } else {
                    $this->assertArrayHasKey($key, $testing_array);

                    $this->assertArrayStructure($structure[$key], $testing_array[$key]);
                }
            } else {
                $this->assertArrayHasKey($value, $testing_array);
            }
        }
    }
}
