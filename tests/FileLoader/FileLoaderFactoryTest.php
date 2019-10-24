<?php

use App\FileLoader\FileLoaderFactory;
use App\FileLoader\IniFileLoader;
use App\FileLoader\JsonFileLoader;
use PHPUnit\Framework\TestCase;

class FileLoaderFactoryTest extends TestCase
{
    /**
     * @dataProvider buildFileLoaderProvider
     */
    public function testBuildFileLoader($fileName, $expectedType)
    {
        $this->assertInstanceOf(
            $expectedType,
            FileLoaderFactory::buildFileLoader($fileName)
        );
    }

    public function testBuildFileLoaderFormatNotSupportedException()
    {
        $this->expectException(\Exception::class);
        FileLoaderFactory::buildFileLoader('non.supported');
    }

    public function buildFileLoaderProvider()
    {
        return [
            ['test.ini', IniFileLoader::class],
            ['test.json', JsonFileLoader::class]
        ];
    }
}
