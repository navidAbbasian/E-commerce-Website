<?php

namespace App\Containers\AppSection\Carousel\Tests\Unit;

use App\Containers\AppSection\Carousel\Events\CarouselDeletedEvent;
use App\Containers\AppSection\Carousel\Models\Carousel;
use App\Containers\AppSection\Carousel\Tasks\DeleteCarouselTask;
use App\Containers\AppSection\Carousel\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class DeleteCarouselTaskTest.
 *
 * @group carousel
 * @group unit
 */
class DeleteCarouselTaskTest extends UnitTestCase
{
    public function testDeleteCarousel(): void
    {
        Event::fake();
        $carousel = Carousel::factory()->create();

        $result = app(DeleteCarouselTask::class)->run($carousel->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(CarouselDeletedEvent::class);
    }

    public function testDeleteCarouselWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeleteCarouselTask::class)->run($noneExistingId);
    }
}
