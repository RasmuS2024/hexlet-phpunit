<?php

namespace Hexlet\Phpunit\Tests;

use PHPUnit\Framework\TestCase;

use function Hexlet\Phpunit\Utils\reverseString;

// Класс UtilsTest наследует класс TestCase
// Имя класса совпадает с именем файла
class UtilsTest extends TestCase
{
    public function getFixtureFullPath(string $fixtureName): mixed
    {
        if (strlen($fixtureName) === 0) {
            return '';
        }
        $parts = [__DIR__, 'fixtures', $fixtureName];
        return realpath(implode('/', $parts));
    }

    // Метод (функция), определенный внутри класса,
    // Должен начинаться со слова test
    // Ключевое слово public нужно, чтобы PHPUnit мог вызвать этот тест снаружи
    public function testReverse(): void
    {
        // Сначала идет ожидаемое значение (expected)
        // И только потом актуальное (actual)
        $this->assertEquals('', reverseString(''));
        $this->assertEquals('olleh', reverseString('hello'));
        // Тестируем длинные строки прочитанные из файла
        $pathToFile1 = $this->getFixtureFullPath('before.txt'); // файл с результирующей строкой
        $pathToFile2 = $this->getFixtureFullPath('after.txt');  // файл с исходной строкой
        $testString = file_get_contents($pathToFile1);
        $reversedStringFromFile = reverseString($testString);
        $this->assertStringEqualsFile($pathToFile2, $reversedStringFromFile);
    }
}
