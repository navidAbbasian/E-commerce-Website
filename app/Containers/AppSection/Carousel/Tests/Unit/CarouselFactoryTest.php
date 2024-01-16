<?php

namespace App\Containers\AppSection\Carousel\Tests\Unit;

use App\Containers\AppSection\Carousel\Models\Carousel;
use App\Containers\AppSection\Carousel\Tests\UnitTestCase;

/**
 * Class CarouselFactoryTest.
 *
 * @group carousel
 * @group unit
 */
class CarouselFactoryTest extends UnitTestCase
{
    public function testCreateCarousel(): void
    {
        $carousel = Carousel::factory()->make();

        $this->assertInstanceOf(Carousel::class, $carousel);
    }
}
