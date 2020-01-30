<?php

declare(strict_types = 1);

namespace AvtoDev\StaticReferencesData\Tests;

use Opis\JsonSchema\Schema;
use Opis\JsonSchema\Validator;

class DataFollowsSchemasTest extends AbstractTestCase
{
    /**
     * @return void
     */
    public function testFilesFollowsSchema(): void
    {
        $jsons_iterator = new \RegexIterator(
            new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($this->getRootDirPath() . '/data')),
            '~^.+\.json$~i', \RecursiveRegexIterator::GET_MATCH
        );

        $schema_postfix = '.schema.json';
        $validator      = new Validator;

        foreach ($jsons_iterator as $paths) {
            foreach ($paths as $path) {
                if (\substr_compare($path, $schema_postfix, -mb_strlen($schema_postfix)) === 0) {
                    continue; // skip schemas
                }

                $schema_path = \preg_replace('~^(.+)(\.json)$~i', '$1.schema$2', $path);

                if (! \file_exists($schema_path)) {
                    $this->fail("File [{$path}] does not have schema file ({$schema_path})");
                }

                $result = $validator->schemaValidation(
                    \json_decode(\file_get_contents($path)),
                    new Schema(\json_decode(\file_get_contents($schema_path)))
                );

                $error_message = ($e = $result->getFirstError()) !== null
                    ? $e->keyword() . ' - ' . \var_export($e->data(), true)
                    : null;

                $this->assertTrue(
                    $result->isValid(),
                    "File [{$path}] validation failed ({$error_message})"
                );
            }
        }
    }
}
