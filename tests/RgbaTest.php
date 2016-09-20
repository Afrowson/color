<?php

namespace Spatie\Color\Test;

use Spatie\Color\Exceptions\InvalidColorValue;
use Spatie\Color\Rgba;

class RgbaTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_is_initializable()
    {
        $rgba = new Rgba(55, 155, 255, 50);

        $this->assertInstanceOf(Rgba::class, $rgba);
        $this->assertEquals(55, $rgba->red());
        $this->assertEquals(155, $rgba->green());
        $this->assertEquals(255, $rgba->blue());
        $this->assertEquals(50, $rgba->alpha());
    }

    /** @test */
    public function it_cant_be_initialized_with_a_negative_color_value()
    {
        $this->expectException(InvalidColorValue::class);

        new Rgba(-5, 255, 255, 50);
    }

    /** @test */
    public function it_cant_be_initialized_with_a_color_value_higher_than_255()
    {
        $this->expectException(InvalidColorValue::class);

        new Rgba(300, 255, 255, 50);
    }

    /** @test */
    public function it_cant_be_initialized_with_a_negative_alpha_value()
    {
        $this->expectException(InvalidColorValue::class);

        new Rgba(255, 255, 255, -50);
    }

    /** @test */
    public function it_cant_be_initialized_with_an_alpha_value_higher_than_255()
    {
        $this->expectException(InvalidColorValue::class);

        new Rgba(255, 255, 255, 150);
    }

    /** @test */
    public function it_can_be_created_from_a_string()
    {
        $rgba = Rgba::fromString('rgba(55,155,255,0.5)');

        $this->assertInstanceOf(Rgba::class, $rgba);
        $this->assertEquals(55, $rgba->red());
        $this->assertEquals(155, $rgba->green());
        $this->assertEquals(255, $rgba->blue());
        $this->assertEquals(50, $rgba->alpha());
    }

    /** @test */
    public function it_cant_be_created_from_malformed_string()
    {
        $this->expectException(InvalidColorValue::class);

        Rgba::fromString('rgba(55,155,255,0.5');
    }

    /** @test */
    public function it_can_be_casted_to_a_string()
    {
        $rgba = new Rgba(55, 155, 255, 50);

        $this->assertEquals('rgba(55,155,255,0.50)', (string) $rgba);
    }

    /** @test */
    public function it_can_be_converted_to_rgb_without_an_alpha_value()
    {
        $rgba = new Rgba(55, 155, 255, 50);
        $rgb = $rgba->toRgb();

        $this->assertEquals(55, $rgb->red());
        $this->assertEquals(155, $rgb->green());
        $this->assertEquals(255, $rgb->blue());
    }

    /** @test */
    public function it_can_be_converted_to_hex_without_an_alpha_value()
    {
        $rgba = new Rgba(55, 155, 255, 50);
        $hex = $rgba->toHex();

        $this->assertEquals('37', $hex->red());
        $this->assertEquals('9b', $hex->green());
        $this->assertEquals('ff', $hex->blue());
    }
}
