<?php

declare(strict_types = 1);

namespace AvtoDev\StaticReferencesData;

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
     * Get cadastral districts reference.
     *
     * @return StaticReference
     */
    public static function cadastralDistricts(): StaticReference
    {
        return new StaticReference(static::getRootDirectoryPath('/data/cadastral/districts.json'));
    }

    /**
     * Get subject codes reference.
     *
     * @link <https://bit.ly/2GB3bda>
     *
     * @return StaticReference
     */
    public static function subjectCodes(): StaticReference
    {
        return new StaticReference(static::getRootDirectoryPath('/data/subject/codes.json'));
    }

    /**
     * Get vehicle fine articles reference.
     *
     * @return StaticReference
     */
    public static function vehicleFineArticles(): StaticReference
    {
        return new StaticReference(static::getRootDirectoryPath('/data/vehicle/fine/articles.json'));
    }

    /**
     * Get vehicle registration actions reference.
     *
     * @return StaticReference
     */
    public static function vehicleRegistrationActions(): StaticReference
    {
        return new StaticReference(static::getRootDirectoryPath('/data/vehicle/registration/actions.json'));
    }

    /**
     * Get vehicle repair methods reference.
     *
     * @return StaticReference
     */
    public static function vehicleRepairMethods(): StaticReference
    {
        return new StaticReference(static::getRootDirectoryPath('/data/vehicle/repair/methods.json'));
    }

    /**
     * Get vehicle categories reference.
     *
     * @return StaticReference
     */
    public static function vehicleCategories(): StaticReference
    {
        return new StaticReference(static::getRootDirectoryPath('/data/vehicle/categories.json'));
    }

    /**
     * Get vehicle types reference.
     *
     * @return StaticReference
     */
    public static function vehicleTypes(): StaticReference
    {
        return new StaticReference(static::getRootDirectoryPath('/data/vehicle/types.json'));
    }
}
