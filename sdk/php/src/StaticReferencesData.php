<?php

declare(strict_types = 1);

namespace AvtoDev\StaticReferencesData;

use Exception;
use AvtoDev\StaticReferencesData\ReferencesData\StaticReference;

class StaticReferencesData
{
    /**
     * Get root references directory path.
     *
     * @param string|null $additional_path
     *
     * @return string
     */
    public static function getRootDirectoryPath(?string $additional_path = null): string
    {
        $root = \dirname(__DIR__, 3);

        return \is_string($additional_path)
            ? $root . DIRECTORY_SEPARATOR . \ltrim($additional_path, ' \\/')
            : $root;
    }

    /**
     * Returns static reference named `auto categories`.
     *
     * @param string $file_name
     *
     * @throws Exception
     *
     * @return StaticReference
     */
    public static function getAutoCategories(string $file_name = 'auto_categories.json'): StaticReference
    {
        return new StaticReference(static::getRootDirectoryPath("/data/auto_categories/{$file_name}"));
    }

    /**
     * Returns static reference named `auto regions`.
     *
     * @param string $file_name
     *
     * @throws Exception
     *
     * @return StaticReference
     */
    public static function getAutoRegions(string $file_name = 'auto_regions.json'): StaticReference
    {
        return new StaticReference(static::getRootDirectoryPath("/data/auto_regions/{$file_name}"));
    }

    /**
     * Returns static reference named `registration actions`.
     *
     * @param string $file_name
     *
     * @throws Exception
     *
     * @return StaticReference
     */
    public static function getRegistrationActions(string $file_name = 'registration_actions.json'): StaticReference
    {
        return new StaticReference(static::getRootDirectoryPath("/data/registration_actions/{$file_name}"));
    }

    /**
     * Returns static reference named `repair methods`.
     *
     * @param string $file_name
     *
     * @throws Exception
     *
     * @return StaticReference
     */
    public static function getRepairMethods(string $file_name = 'repair_methods.json'): StaticReference
    {
        return new StaticReference(static::getRootDirectoryPath("/data/repair_methods/{$file_name}"));
    }

    /**
     * Returns static reference named `auto fines`.
     *
     * @param string $file_name
     *
     * @throws Exception
     *
     * @return StaticReference
     */
    public static function getAutoFines(string $file_name = 'auto_fines.json'): StaticReference
    {
        return new StaticReference(static::getRootDirectoryPath("/data/auto_fines/{$file_name}"));
    }

    /**
     * Returns static reference named `vehicle types`.
     *
     * @param string $file_name
     *
     * @throws Exception
     *
     * @return StaticReference
     */
    public static function getVehicleTypes(string $file_name = 'vehicle_types.json'): StaticReference
    {
        return new StaticReference(static::getRootDirectoryPath("/data/vehicle_types/{$file_name}"));
    }

    /**
     * Returns static reference named `cadastral districts`.
     *
     * @param string $file_name
     *
     * @throws Exception
     *
     * @return StaticReference
     */
    public static function getCadastralDistricts(string $file_name = 'cadastral_districts.json'): StaticReference
    {
        return new StaticReference(static::getRootDirectoryPath("/data/cadastral_districts/{$file_name}"));
    }
}
