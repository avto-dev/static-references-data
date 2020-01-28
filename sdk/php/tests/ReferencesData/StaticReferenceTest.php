<?php

declare(strict_types = 1);

namespace AvtoDev\StaticReferencesData\Tests\ReferencesData;

use InvalidArgumentException;
use AvtoDev\StaticReferencesData\Tests\AbstractTestCase;
use Tarampampam\Wrappers\Exceptions\JsonEncodeDecodeException;
use AvtoDev\StaticReferencesData\ReferencesData\StaticReference;
use AvtoDev\StaticReferencesData\ReferencesData\StaticReferenceInterface;

class StaticReferenceTest extends AbstractTestCase
{
    /**
     * @return void
     */
    public function testInstancesOf(): void
    {
        $this->assertInstanceOf(StaticReferenceInterface::class, new StaticReference(__FILE__));
    }

    /**
     * @return void
     */
    public function testThrowExceptionOnPassedNonExistsFile(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessageRegExp('~is not readable~i');

        new StaticReference('');
    }

    /**
     * @return void
     */
    public function testThrowExceptionOnPassedNonValidJson(): void
    {
        $this->expectException(JsonEncodeDecodeException::class);

        $instance = new StaticReference(__DIR__ . '/../Stubs/wrong_json.json');
        $instance->getContent();
    }

    /**
     * @return void
     */
    public function testGetters(): void
    {
        $instance = new StaticReference(
            $path = $this->getRootDirPath() . '/data/auto_categories/auto_categories.json'
        );

        $this->assertNotEmpty($hash = $instance->getHash());
        $this->assertTrue(mb_strlen($hash) >= 8);
        $this->assertRegExp('~[a-f0-9]~', $hash);
        $this->assertSame($hash, $instance->getHash());

        $this->assertSame($path, $instance->getFilePath());

        $this->assertIsArray($content = $instance->getContent());
        $this->assertNotEmpty($content);
        $this->assertSame($content, $instance->getContent());
    }
}
