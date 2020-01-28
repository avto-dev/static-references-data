<?php

declare(strict_types = 1);

namespace AvtoDev\StaticReferencesData\ReferencesData;

use RuntimeException;
use InvalidArgumentException;
use Tarampampam\Wrappers\Json;
use Tarampampam\Wrappers\Exceptions\JsonEncodeDecodeException;

class StaticReference implements StaticReferenceInterface
{
    /**
     * Reference source file path.
     *
     * @var string
     */
    protected $file_path;

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
     * {@inheritdoc}
     *
     * @throws JsonEncodeDecodeException
     */
    public function getContent(): array
    {
        return (array) $this->getData(true);
    }

    /**
     * {@inheritdoc}
     *
     * @throws JsonEncodeDecodeException
     */
    public function getData(bool $as_array = true, int $options = 0)
    {
        /** @var mixed[]|object[]|object $data */
        $data = Json::decode((string) \file_get_contents($this->file_path), $as_array, 512, $options);

        return $data;
    }
}
