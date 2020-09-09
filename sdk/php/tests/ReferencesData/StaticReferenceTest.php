<?php

declare(strict_types = 1);

namespace AvtoDev\StaticReferencesData\Tests\ReferencesData;

use InvalidArgumentException;
use AvtoDev\StaticReferencesData\Tests\AbstractTestCase;
use AvtoDev\StaticReferencesData\ReferencesData\StaticReference;
use AvtoDev\StaticReferencesData\ReferencesData\StaticReferenceInterface;

/**
 * @covers \AvtoDev\StaticReferencesData\ReferencesData\StaticReference
 */
class StaticReferenceTest extends AbstractTestCase
{
    /**
     * @var StaticReference
     */
    protected $reference;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->reference = new StaticReference(__DIR__ . '/sample.json');
    }

    /**
     * @return void
     */
    public function testInstancesOf(): void
    {
        $this->assertInstanceOf(StaticReferenceInterface::class, $this->reference);
    }

    /**
     * @return void
     */
    public function testThrowExceptionOnPassedNonExistsFile(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessageMatches('~is not readable~i');

        new StaticReference('');
    }

    /**
     * @return void
     */
    public function testGetHash(): void
    {
        $this->assertSame(\md5_file($this->reference->getFilePath(), false), $this->reference->getHash());
    }

    /**
     * @return void
     */
    public function testGetFilePath(): void
    {
        $this->assertSame(__DIR__ . '/sample.json', $this->reference->getFilePath());
    }

    /**
     * @deprecated
     *
     * @return void
     */
    public function testGetData(): void
    {
        $content = $this->reference->getData();

        $this->assertIsArray($content);

        $this->assertArrayHasKey('foo', $content[0]);
        $this->assertSame(1, $content[0]['foo']);

        $this->assertArrayHasKey('foo', $content[1]);
        $this->assertSame(2, $content[1]['foo']);
    }

    /**
     * @return void
     */
    public function testGetDataAsArray(): void
    {
        $as_array = $this->reference->getData(true);

        $this->assertIsArray($as_array[0]);
        $this->assertSame(1, $as_array[0]['foo']);
        $this->assertSame(2, $as_array[1]['foo']);
    }

    /**
     * @return void
     */
    public function testGetDataAsObject(): void
    {
        $as_object = $this->reference->getData(false);

        $this->assertIsObject($as_object[0]);
        $this->assertSame(1, $as_object[0]->foo);
        $this->assertSame(2, $as_object[1]->foo);
    }
}
