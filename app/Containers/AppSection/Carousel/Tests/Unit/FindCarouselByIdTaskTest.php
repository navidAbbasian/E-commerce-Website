<?php

namespace App\Containers\AppSection\Carousel\Tests\Unit;

use App\Containers\AppSection\Carousel\Events\CarouselFoundByIdEvent;
use App\Containers\AppSection\Carousel\Models\Carousel;
use App\Containers\AppSection\Carousel\Tasks\FindCarouselByIdTask;
use App\Containers\AppSection\Carousel\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class FindCarouselByIdTaskTest.
 *
 * @group carousel
 * @group unit
 */
class FindCarouselByIdTaskTest extends UnitTestCase
{
    public function testFindCarouselById(): void
    {
        Event::fake();
        $carousel = Carousel::factory()->create();

        $foundCarousel = app(FindCarouselByIdTask::class)->run($carousel->id);

        $this->assertEquals($carousel->id, $foundCarousel->id);
        Event::assertDispatched(CarouselFoundByIdEvent::class);
    }

    public function testFindCarouselWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindCarouselByIdTask::class)->run($noneExistingId);
    }
}
