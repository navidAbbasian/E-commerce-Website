<?php

namespace App\Containers\AppSection\Province\Tests\Unit;

use App\Containers\AppSection\Province\Events\CityCreatedEvent;
use App\Containers\AppSection\Province\Tasks\CreateCityTask;
use App\Containers\AppSection\Province\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * Class CreateCityTaskTest.
 *
 * @group city
 * @group unit
 */
class CreateCityTaskTest extends UnitTestCase
{
    public function testCreateCity(): void
    {
        Event::fake();
        $data = [];

        $city = app(CreateCityTask::class)->run($data);

        $this->assertModelExists($city);
        Event::assertDispatched(CityCreatedEvent::class);
    }

    // TODO TEST
//    public function testCreateCityWithInvalidData(): void
//    {
//        $this->expectException(CreateResourceFailedException::class);
//
//        $data = [
//            // put some invalid data here
//            // 'invalid' => 'data',
//        ];
//
//        app(CreateCityTask::class)->run($data);
//    }
}
