<?php

namespace AvtoDev\StaticReferencesData\ReferencesData;

interface StaticReferenceInterface
{
    /**
     * Returns source file hash.
     *
     * @return string
     */
    public function getHash();

    /**
     * Returns source file path.
     *
     * @return string
     */
    public function getFilePath();

    /**
     * Returns source content as an array.
     *
     * @throws \Exception
     *
     * @return array|mixed[]
     */
    public function getContent();
}
