<?php

namespace App\Containers\AppSection\Province\Tests\Unit;

use App\Containers\AppSection\Province\Events\CityFoundByIdEvent;
use App\Containers\AppSection\Province\Models\City;
use App\Containers\AppSection\Province\Tasks\FindCityByIdTask;
use App\Containers\AppSection\Province\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class FindCityByIdTaskTest.
 *
 * @group city
 * @group unit
 */
class FindCityByIdTaskTest extends UnitTestCase
{
    public function testFindCityById(): void
    {
        Event::fake();
        $city = City::factory()->create();

        $foundCity = app(FindCityByIdTask::class)->run($city->id);

        $this->assertEquals($city->id, $foundCity->id);
        Event::assertDispatched(CityFoundByIdEvent::class);
    }

    public function testFindCityWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindCityByIdTask::class)->run($noneExistingId);
    }
}
