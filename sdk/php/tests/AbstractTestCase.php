<?php

declare(strict_types = 1);

namespace AvtoDev\StaticReferencesData\Tests;

use PHPUnit\Framework\TestCase;

abstract class AbstractTestCase extends TestCase
{
    /**
     * @return string
     */
    protected function getRootDirPath(): string
    {
        return (string) \realpath(__DIR__ . '/../../..');
    }
}
