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
     * Возвращает данные справочника "Категории ТС".
     *
     * @param string $file_name
     *
     * @throws Exception
     *
     * @deprecated 2.0.0 No longer used by internal code and not recommended.
     *
     * @return array[]
     */
    public static function getAutoCategoriesData($file_name = 'auto_categories.json')
    {
        return static::getJsonFileAsArray(
            static::getRootDirectoryPath(sprintf('/data/auto_categories/%s', $file_name))
        );
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
     * Возвращает данные справочника "Данные по регионам".
     *
     * @param string $file_name
     *
     * @throws Exception
     *
     * @deprecated 2.0.0 No longer used by internal code and not recommended.
     *
     * @return array[]
     */
    public static function getAutoRegionsData($file_name = 'auto_regions.json')
    {
        return static::getJsonFileAsArray(
            static::getRootDirectoryPath(sprintf('/data/auto_regions/%s', $file_name))
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
     * Возвращает данные справочника "Регистрационные действия".
     *
     * @param string $file_name
     *
     * @throws Exception
     *
     * @deprecated 2.0.0 No longer used by internal code and not recommended.
     *
     * @return array[]
     */
    public static function getRegistrationActionsData($file_name = 'registration_actions.json')
    {
        return static::getJsonFileAsArray(
            static::getRootDirectoryPath(sprintf('/data/registration_actions/%s', $file_name))
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

    /**
     * Возвращает контент json файла в виде php-массива.
     *
     * @param string $file_path
     *
     * @throws Exception
     *
     * @deprecated 2.0.0 No longer used by internal code and not recommended.
     *
     * @return array
     */
    protected static function getJsonFileAsArray($file_path)
    {
        if (! file_exists($file_path)) {
            throw new Exception(sprintf('File "%s" was not found', $file_path));
        }

        $result = json_decode(file_get_contents($file_path), true);

        if (! is_array($result) || json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception(sprintf('Cannot parse json file: "%s"', $file_path));
        }

        return $result;
    }
}
