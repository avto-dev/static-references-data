<?php

declare(strict_types = 1);

namespace AvtoDev\StaticReferencesData\ReferencesData;

use RuntimeException;
use InvalidArgumentException;

class StaticReference implements StaticReferenceInterface
{
    /**
     * Reference source file path.
     *
     * @var string
     */
    protected $file_path;

    /**
     * Source data.
     *
     * @var mixed[]|object[]|object|null
     */
    protected $data;

    /**
     * Create a new reference instance.
     *
     * @param string $file_path
     *
     * @throws InvalidArgumentException
     */
    public function __construct(string $file_path)
    {
        if (! \is_readable($file_path)) {
            throw new InvalidArgumentException("File [{$file_path}] is not readable");
        }

        $this->file_path = $file_path;
    }

    /**
     * {@inheritdoc}
     *
     * @throws RuntimeException
     */
    public function getHash(): string
    {
        $hash = \md5_file($this->file_path, false);

        // @codeCoverageIgnoreStart
        if (! \is_string($hash)) {
            throw new RuntimeException("Cannot calculate hash for file [{$this->file_path}]");
        }
        // @codeCoverageIgnoreEnd

        return $hash;
    }

    /**
     * {@inheritdoc}
     */
    public function getFilePath(): string
    {
        return $this->file_path;
    }

    /**
     * Returns source content as objects or associative arrays.
     *
     * @param bool $as_array When TRUE, returned objects will be converted into associative arrays
     * @param int  $options  Bitmask of JSON decode options
     *
     * @return array[]|object[]|array<mixed>|object
     */
    public function getData(bool $as_array = true, int $options = 0)
    {
        if (! isset($this->data)) {
            $this->data = \json_decode((string) \file_get_contents($this->file_path), $as_array, 512, $options);
        }

        return $this->data;
    }
}
