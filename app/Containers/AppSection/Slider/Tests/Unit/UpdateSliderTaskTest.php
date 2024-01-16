<?php

namespace App\Containers\AppSection\Slider\Tests\Unit;

use App\Containers\AppSection\Slider\Events\SliderUpdatedEvent;
use App\Containers\AppSection\Slider\Models\Slider;
use App\Containers\AppSection\Slider\Tasks\UpdateSliderTask;
use App\Containers\AppSection\Slider\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class UpdateSliderTaskTest.
 *
 * @group slider
 * @group unit
 */
class UpdateSliderTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateSlider(): void
    {
        Event::fake();
        $slider = Slider::factory()->create();
        $data = [
            // add some fillable fields here
            // 'some_field' => 'new_field_data',
        ];

        $updatedSlider = app(UpdateSliderTask::class)->run($data, $slider->id);

        $this->assertEquals($slider->id, $updatedSlider->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedSlider->some_field);
        Event::assertDispatched(SliderUpdatedEvent::class);
    }

    public function testUpdateSliderWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdateSliderTask::class)->run([], $noneExistingId);
    }
}
