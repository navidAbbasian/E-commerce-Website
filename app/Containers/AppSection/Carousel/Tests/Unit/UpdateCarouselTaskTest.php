<?php

namespace App\Containers\AppSection\Carousel\Tests\Unit;

use App\Containers\AppSection\Carousel\Events\CarouselUpdatedEvent;
use App\Containers\AppSection\Carousel\Models\Carousel;
use App\Containers\AppSection\Carousel\Tasks\UpdateCarouselTask;
use App\Containers\AppSection\Carousel\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class UpdateCarouselTaskTest.
 *
 * @group carousel
 * @group unit
 */
class UpdateCarouselTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateCarousel(): void
    {
        Event::fake();
        $carousel = Carousel::factory()->create();
        $data = [
            // add some fillable fields here
            // 'some_field' => 'new_field_data',
        ];

        $updatedCarousel = app(UpdateCarouselTask::class)->run($data, $carousel->id);

        $this->assertEquals($carousel->id, $updatedCarousel->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedCarousel->some_field);
        Event::assertDispatched(CarouselUpdatedEvent::class);
    }

    public function testUpdateCarouselWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdateCarouselTask::class)->run([], $noneExistingId);
    }
}
