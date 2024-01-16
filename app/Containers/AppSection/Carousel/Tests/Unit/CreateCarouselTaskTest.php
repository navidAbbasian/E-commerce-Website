<?php

namespace App\Containers\AppSection\Carousel\Tests\Unit;

use App\Containers\AppSection\Carousel\Events\CarouselCreatedEvent;
use App\Containers\AppSection\Carousel\Tasks\CreateCarouselTask;
use App\Containers\AppSection\Carousel\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * Class CreateCarouselTaskTest.
 *
 * @group carousel
 * @group unit
 */
class CreateCarouselTaskTest extends UnitTestCase
{
    public function testCreateCarousel(): void
    {
        Event::fake();
        $data = [];

        $carousel = app(CreateCarouselTask::class)->run($data);

        $this->assertModelExists($carousel);
        Event::assertDispatched(CarouselCreatedEvent::class);
    }

    // TODO TEST
//    public function testCreateCarouselWithInvalidData(): void
//    {
//        $this->expectException(CreateResourceFailedException::class);
//
//        $data = [
//            // put some invalid data here
//            // 'invalid' => 'data',
//        ];
//
//        app(CreateCarouselTask::class)->run($data);
//    }
}
