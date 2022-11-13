<?php

use Spatie\Color\Color;
use Spatie\Color\Contrast;
use function PHPUnit\Framework\assertSame;

it('can calculate contrast', function (Color $a, Color $b, float $contrast) {
    assertSame($contrast, Contrast::ratio($a, $b));
})->with('contrast_colors');

it('can calculate contrast from another format', function (Color $a, Color $b, float $contrast) {
    assertSame($contrast, Contrast::ratio($a->toRgba(), $b->toHsl()));
})->with('contrast_colors');
