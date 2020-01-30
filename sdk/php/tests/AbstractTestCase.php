<?php

declare(strict_types = 1);

namespace AvtoDev\StaticReferencesData\Tests;

abstract class AbstractTestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @return string
     */
    protected function getRootDirPath(): string
    {
        return (string) \realpath(__DIR__ . '/../../..');
    }
}
