<?php

namespace AvtoDev\StaticReferencesData;

use Exception;
use AvtoDev\StaticReferencesData\ReferencesData\StaticReference;

/**
 * Class StaticReferencesData.
 *
 * Класс, упрощающий доступ к файлам статических данных.
 */
class StaticReferencesData
{
    /**
     * Возвращает путь к корневой директории.
     *
     * @param string|null $additional_path
     *
     * @return string
     */
    public static function getRootDirectoryPath($additional_path = null)
    {
        static $root = null;

        $root = is_null($root)
            ? realpath(__DIR__ . '/../../..')
            : $root;

        return is_string($additional_path) && ! empty($additional_path)
            ? $root . DIRECTORY_SEPARATOR . ltrim((string) $additional_path, ' \\/')
            : $root;
    }

    /**
     * Returns static reference named 'auto categories'.
     *
     * @param string $file_name
     *
     * @throws Exception
     *
     * @return StaticReference
     */
    public static function getAutoCategories($file_name = 'auto_categories.json')
    {
        return new StaticReference(
            static::getRootDirectoryPath(sprintf('/data/auto_categories/%s', $file_name))
        );
    }

    /**
     * Returns static reference named 'auto regions'.
     *
     * @param string $file_name
     *
     * @throws Exception
     *
     * @return StaticReference
     */
    public static function getAutoRegions($file_name = 'auto_regions.json')
    {
        return new StaticReference(
            static::getRootDirectoryPath(sprintf('/data/auto_regions/%s', $file_name))
        );
    }

    /**
     * Returns static reference named 'registration actions'.
     *
     * @param string $file_name
     *
     * @throws Exception
     *
     * @return StaticReference
     */
    public static function getRegistrationActions($file_name = 'registration_actions.json')
    {
        return new StaticReference(
            static::getRootDirectoryPath(sprintf('/data/registration_actions/%s', $file_name))
        );
    }
}
