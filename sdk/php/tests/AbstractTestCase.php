<?php

namespace AvtoDev\StaticReferencesData\Tests;

use PHPUnit\Framework\TestCase;

abstract class AbstractTestCase extends TestCase
{
    /**
     * Возвращает путь к базовой директории репозитория.
     *
     * @return bool|string
     */
    protected function getRootDirPath()
    {
        return \realpath(__DIR__ . '/../../..');
    }
}
