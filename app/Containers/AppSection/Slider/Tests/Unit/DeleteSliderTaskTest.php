<?php

namespace App\Containers\AppSection\Slider\Tests\Unit;

use App\Containers\AppSection\Slider\Events\SliderDeletedEvent;
use App\Containers\AppSection\Slider\Models\Slider;
use App\Containers\AppSection\Slider\Tasks\DeleteSliderTask;
use App\Containers\AppSection\Slider\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class DeleteSliderTaskTest.
 *
 * @group slider
 * @group unit
 */
class DeleteSliderTaskTest extends UnitTestCase
{
    public function testDeleteSlider(): void
    {
        Event::fake();
        $slider = Slider::factory()->create();

        $result = app(DeleteSliderTask::class)->run($slider->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(SliderDeletedEvent::class);
    }

    public function testDeleteSliderWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeleteSliderTask::class)->run($noneExistingId);
    }
}
