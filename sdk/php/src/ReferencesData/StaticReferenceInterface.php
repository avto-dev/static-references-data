<?php

namespace AvtoDev\StaticReferencesData\ReferencesData;

use Exception;

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
     * @throws Exception
     *
     * @deprecated since v3 this method will be replaced with `::getData(bool $as_array = true, int $options = 0)`
     *
     * @return mixed[]|object[]
     */
    public function getContent();

    /**
     * Returns source content as abjects or associative arrays.
     *
     * @param bool $as_array When TRUE, returned objects will be converted into associative arrays
     * @param int  $options  Bitmask of JSON decode options
     *
     * @throws Exception
     *
     * @return mixed[]|object[]|object
     */
    public function getData(bool $as_array = true, int $options = 0);
}
