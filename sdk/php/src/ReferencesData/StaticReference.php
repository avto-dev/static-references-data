<?php

namespace AvtoDev\StaticReferencesData\ReferencesData;

use InvalidArgumentException;
use UnexpectedValueException;

class StaticReference implements StaticReferenceInterface
{
    /**
     * Reference source file path.
     *
     * @var string
     */
    protected $file_path;

    /**
     * AbstractStaticReferenceData constructor.
     *
     * @param string $file_path
     *
     * @throws InvalidArgumentException
     */
    public function __construct($file_path)
    {
        if (! \file_exists($file_path) || ! \is_readable($file_path)) {
            throw new InvalidArgumentException("File [{$file_path}] is not readable");
        }

        $this->file_path = $file_path;
    }

    /**
     * {@inheritdoc}
     */
    public function getHash()
    {
        return \md5_file($this->file_path, false);
    }

    /**
     * {@inheritdoc}
     */
    public function getFilePath()
    {
        return $this->file_path;
    }

    /**
     * {@inheritdoc}
     */
    public function getContent()
    {
        // By default - read source file as a json
        $result = \json_decode(\file_get_contents($this->file_path), true);

        if (! \is_array($result) || \json_last_error() !== JSON_ERROR_NONE) {
            throw new UnexpectedValueException("Cannot parse json file: [{$this->file_path}]");
        }

        return $result;
    }
}
