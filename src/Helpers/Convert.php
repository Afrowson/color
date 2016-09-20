<?php

namespace Spatie\Color\Helpers;

class Convert
{
    public static function hexValueToRgbValue(string $hexValue): int
    {
        return hexdec($hexValue);
    }

    public static function rgbValueToHexValue(int $rgbValue): string
    {
        return dechex($rgbValue);
    }
}
