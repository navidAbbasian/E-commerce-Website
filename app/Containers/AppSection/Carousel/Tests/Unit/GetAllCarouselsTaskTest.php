<?php

namespace App\Containers\AppSection\Carousel\Tests\Unit;

use App\Containers\AppSection\Carousel\Events\CarouselsListedEvent;
use App\Containers\AppSection\Carousel\Models\Carousel;
use App\Containers\AppSection\Carousel\Tasks\GetAllCarouselsTask;
use App\Containers\AppSection\Carousel\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * Class GetAllCarouselsTaskTest.
 *
 * @group carousel
 * @group unit
 */
class GetAllCarouselsTaskTest extends UnitTestCase
{
    public function testGetAllCarousels(): void
    {
        Event::fake();
        Carousel::factory()->count(3)->create();

        $foundCarousels = app(GetAllCarouselsTask::class)->run();

        $this->assertCount(3, $foundCarousels);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundCarousels);
        Event::assertDispatched(CarouselsListedEvent::class);
    }
}
