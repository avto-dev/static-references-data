<?php

declare(strict_types = 1);

namespace AvtoDev\StaticReferencesData;

use AvtoDev\StaticReferencesData\ReferencesData\StaticReference;
use AvtoDev\StaticReferencesData\ReferencesData\StaticReferenceInterface;

class StaticReferencesData
{
    /**
     * @var array<string, StaticReferenceInterface>
     */
    private static $references;

    /**
     * Path to files with static data. Should be unique.
     */
    private const
        CADASTRAL_DISTRICTS_PATH = '/data/cadastral/districts.json',
        SUBJECT_CODES_PATH = '/data/subject/codes.json',
        VEHICLE_FINE_ARTICLES_PATH = '/data/vehicle/fine/articles.json',
        VEHICLE_REGISTRATION_ACTIONS_PATH = '/data/vehicle/registration/actions.json',
        VEHICLE_REPAIR_METHODS_PATH = '/data/vehicle/repair/methods.json',
        VEHICLE_CATEGORIES_PATH = '/data/vehicle/categories.json',
        VEHICLE_TYPES_PATH = '/data/vehicle/types.json';

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
     * @return StaticReferenceInterface
     */
    public static function cadastralDistricts(): StaticReferenceInterface
    {
        return static::$references[static::CADASTRAL_DISTRICTS_PATH]
            ?? static::$references[static::CADASTRAL_DISTRICTS_PATH] =
                new StaticReference(static::getRootDirectoryPath(static::CADASTRAL_DISTRICTS_PATH));
    }

    /**
     * Get subject codes reference.
     *
     * @link <https://bit.ly/2GB3bda>
     *
     * @return StaticReferenceInterface
     */
    public static function subjectCodes(): StaticReferenceInterface
    {
        return static::$references[static::SUBJECT_CODES_PATH]
            ?? static::$references[static::SUBJECT_CODES_PATH] =
                new StaticReference(static::getRootDirectoryPath(static::SUBJECT_CODES_PATH));
    }

    /**
     * Get vehicle fine articles reference.
     *
     * @return StaticReferenceInterface
     */
    public static function vehicleFineArticles(): StaticReferenceInterface
    {
        return static::$references[static::VEHICLE_FINE_ARTICLES_PATH]
            ?? static::$references[static::VEHICLE_FINE_ARTICLES_PATH] =
                new StaticReference(static::getRootDirectoryPath(static::VEHICLE_FINE_ARTICLES_PATH));
    }

    /**
     * Get vehicle registration actions reference.
     *
     * @return StaticReferenceInterface
     */
    public static function vehicleRegistrationActions(): StaticReferenceInterface
    {
        return static::$references[static::VEHICLE_REGISTRATION_ACTIONS_PATH]
            ?? static::$references[static::VEHICLE_REGISTRATION_ACTIONS_PATH] =
                new StaticReference(static::getRootDirectoryPath(static::VEHICLE_REGISTRATION_ACTIONS_PATH));
    }

    /**
     * Get vehicle repair methods reference.
     *
     * @return StaticReferenceInterface
     */
    public static function vehicleRepairMethods(): StaticReferenceInterface
    {
        return static::$references[static::VEHICLE_REPAIR_METHODS_PATH]
            ?? static::$references[static::VEHICLE_REPAIR_METHODS_PATH] =
                new StaticReference(static::getRootDirectoryPath(static::VEHICLE_REPAIR_METHODS_PATH));
    }

    /**
     * Get vehicle categories reference.
     *
     * @return StaticReferenceInterface
     */
    public static function vehicleCategories(): StaticReferenceInterface
    {
        return static::$references[static::VEHICLE_CATEGORIES_PATH]
            ?? static::$references[static::VEHICLE_CATEGORIES_PATH] =
                new StaticReference(static::getRootDirectoryPath(static::VEHICLE_CATEGORIES_PATH));
    }

    /**
     * Get vehicle types reference.
     *
     * @return StaticReferenceInterface
     */
    public static function vehicleTypes(): StaticReferenceInterface
    {
        return static::$references[static::VEHICLE_TYPES_PATH]
            ?? static::$references[static::VEHICLE_TYPES_PATH] =
                new StaticReference(static::getRootDirectoryPath(static::VEHICLE_TYPES_PATH));
    }
}
