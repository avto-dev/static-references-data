<?php

namespace AvtoDev\StaticReferencesData;

use AvtoDev\StaticReferencesData\ReferencesData\StaticReference;
use Exception;

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
        $root = \dirname(\dirname(\dirname(__DIR__)));

        return \is_string($additional_path) && ! empty($additional_path)
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

    /**
     * Returns static reference named 'repair methods'.
     *
     * @param string $file_name
     *
     * @throws Exception
     *
     * @return StaticReference
     */
    public static function getRepairMethods($file_name = 'repair_methods.json')
    {
        return new StaticReference(
            static::getRootDirectoryPath(sprintf('/data/repair_methods/%s', $file_name))
        );
    }

    /**
     * Returns static reference named 'auto fines'.
     *
     * @param string $file_name
     *
     * @throws Exception
     *
     * @return StaticReference
     */
    public static function getAutoFines($file_name = 'auto_fines.json')
    {
        return new StaticReference(
            static::getRootDirectoryPath(sprintf('/data/auto_fines/%s', $file_name))
        );
    }

    /**
     * Returns static reference named 'vehicle types'.
     *
     * @param string $file_name
     *
     * @throws Exception
     *
     * @return StaticReference
     */
    public static function getVehicleTypes($file_name = 'vehicle_types.json')
    {
        return new StaticReference(
            static::getRootDirectoryPath(sprintf('/data/vehicle_types/%s', $file_name))
        );
    }

    /**
     * Returns static reference named 'cadastral districts'.
     *
     * @param string $file_name
     *
     * @throws Exception
     *
     * @return StaticReference
     */
    public static function getCadastralDistricts($file_name = 'cadastral_districts.json')
    {
        return new StaticReference(
            static::getRootDirectoryPath(sprintf('/data/cadastral_districts/%s', $file_name))
        );
    }
}
