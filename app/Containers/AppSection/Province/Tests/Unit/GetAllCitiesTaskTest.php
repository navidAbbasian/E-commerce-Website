<?php

namespace App\Containers\AppSection\Province\Tests\Unit;

use App\Containers\AppSection\Province\Events\CitiesListedEvent;
use App\Containers\AppSection\Province\Models\City;
use App\Containers\AppSection\Province\Tasks\GetAllCitiesTask;
use App\Containers\AppSection\Province\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * Class GetAllCitiesTaskTest.
 *
 * @group city
 * @group unit
 */
class GetAllCitiesTaskTest extends UnitTestCase
{
    public function testGetAllCities(): void
    {
        Event::fake();
        City::factory()->count(3)->create();

        $foundCities = app(GetAllCitiesTask::class)->run();

        $this->assertCount(3, $foundCities);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundCities);
        Event::assertDispatched(CitiesListedEvent::class);
    }
}
