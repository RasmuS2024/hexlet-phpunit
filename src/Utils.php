<?php

namespace Hexlet\Phpunit\Utils;

// Эта функция переворачивает переданную строку
function reverseString(mixed $string): string
{
    if (strlen($string) === 0) {
        return '';
    }
    if (strlen($string) === 1) {
        return $string;
    }
    return implode(array_reverse(str_split($string)));
}
