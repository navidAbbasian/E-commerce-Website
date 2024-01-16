<?php

namespace App\Containers\AppSection\Slider\Tests\Unit;

use App\Containers\AppSection\Slider\Models\Slider;
use App\Containers\AppSection\Slider\Tests\UnitTestCase;

/**
 * Class SliderFactoryTest.
 *
 * @group slider
 * @group unit
 */
class SliderFactoryTest extends UnitTestCase
{
    public function testCreateSlider(): void
    {
        $slider = Slider::factory()->make();

        $this->assertInstanceOf(Slider::class, $slider);
    }
}
