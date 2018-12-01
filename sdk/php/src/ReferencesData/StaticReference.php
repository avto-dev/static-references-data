<?php

namespace AvtoDev\StaticReferencesData\ReferencesData;

use InvalidArgumentException;
use Tarampampam\Wrappers\Exceptions\JsonEncodeDecodeException;
use Tarampampam\Wrappers\Json;

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
        if (! \is_file($file_path) || ! \is_readable($file_path)) {
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
     *
     * @throws JsonEncodeDecodeException
     */
    public function getContent()
    {
        return (array) Json::decode(\file_get_contents($this->file_path), true);
    }
}
