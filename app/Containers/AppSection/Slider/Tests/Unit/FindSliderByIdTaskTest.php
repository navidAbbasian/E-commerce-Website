<?php

namespace App\Containers\AppSection\Slider\Tests\Unit;

use App\Containers\AppSection\Slider\Events\SliderFoundByIdEvent;
use App\Containers\AppSection\Slider\Models\Slider;
use App\Containers\AppSection\Slider\Tasks\FindSliderByIdTask;
use App\Containers\AppSection\Slider\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class FindSliderByIdTaskTest.
 *
 * @group slider
 * @group unit
 */
class FindSliderByIdTaskTest extends UnitTestCase
{
    public function testFindSliderById(): void
    {
        Event::fake();
        $slider = Slider::factory()->create();

        $foundSlider = app(FindSliderByIdTask::class)->run($slider->id);

        $this->assertEquals($slider->id, $foundSlider->id);
        Event::assertDispatched(SliderFoundByIdEvent::class);
    }

    public function testFindSliderWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindSliderByIdTask::class)->run($noneExistingId);
    }
}
