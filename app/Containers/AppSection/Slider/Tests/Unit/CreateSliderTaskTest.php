<?php

namespace App\Containers\AppSection\Slider\Tests\Unit;

use App\Containers\AppSection\Slider\Events\SliderCreatedEvent;
use App\Containers\AppSection\Slider\Tasks\CreateSliderTask;
use App\Containers\AppSection\Slider\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * Class CreateSliderTaskTest.
 *
 * @group slider
 * @group unit
 */
class CreateSliderTaskTest extends UnitTestCase
{
    public function testCreateSlider(): void
    {
        Event::fake();
        $data = [];

        $slider = app(CreateSliderTask::class)->run($data);

        $this->assertModelExists($slider);
        Event::assertDispatched(SliderCreatedEvent::class);
    }

    // TODO TEST
//    public function testCreateSliderWithInvalidData(): void
//    {
//        $this->expectException(CreateResourceFailedException::class);
//
//        $data = [
//            // put some invalid data here
//            // 'invalid' => 'data',
//        ];
//
//        app(CreateSliderTask::class)->run($data);
//    }
}
