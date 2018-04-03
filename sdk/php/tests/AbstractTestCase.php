<?php

namespace AvtoDev\StaticReferencesData\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Class AbstractTestCase.
 */
abstract class AbstractTestCase extends TestCase
{
    /**
     * Возвращает путь к базовой директории репозитория.
     *
     * @return bool|string
     */
    protected function getRootDirPath()
    {
        return realpath(__DIR__ . '/../../..');
    }

    /**
     * Проверяет что значение является строкой
     *
     * @param mixed $value
     * @param null  $message
     *
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    protected function assertIsString($value, $message = null)
    {
        if (empty($message)) {
            $message = sprintf('Failed assert that "%s" is string', $value);
        }
        $this->assertTrue(
            is_string($value),
            $message
        );
    }

    /**
     * Проверяет что значение является числом
     *
     * @param mixed $value
     * @param null  $message
     *
     * @throws \PHPUnit\Framework\ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    protected function assertIsInt($value, $message = null)
    {
        if (empty($message)) {
            $message = sprintf('Failed assert that "%s" is integer', $value);
        }
        $this->assertTrue(
            is_int($value),
            $message
        );
    }
}
