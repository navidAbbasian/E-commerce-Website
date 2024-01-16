<?php

namespace App\Containers\AppSection\Slider\Tests\Unit;

use App\Containers\AppSection\Slider\Events\SlidersListedEvent;
use App\Containers\AppSection\Slider\Models\Slider;
use App\Containers\AppSection\Slider\Tasks\GetAllSlidersTask;
use App\Containers\AppSection\Slider\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * Class GetAllSlidersTaskTest.
 *
 * @group slider
 * @group unit
 */
class GetAllSlidersTaskTest extends UnitTestCase
{
    public function testGetAllSliders(): void
    {
        Event::fake();
        Slider::factory()->count(3)->create();

        $foundSliders = app(GetAllSlidersTask::class)->run();

        $this->assertCount(3, $foundSliders);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundSliders);
        Event::assertDispatched(SlidersListedEvent::class);
    }
}
