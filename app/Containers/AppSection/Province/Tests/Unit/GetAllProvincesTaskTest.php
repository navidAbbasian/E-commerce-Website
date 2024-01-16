<?php

namespace App\Containers\AppSection\Province\Tests\Unit;

use App\Containers\AppSection\Province\Events\ProvincesListedEvent;
use App\Containers\AppSection\Province\Models\Province;
use App\Containers\AppSection\Province\Tasks\GetAllProvincesTask;
use App\Containers\AppSection\Province\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * Class GetAllProvincesTaskTest.
 *
 * @group province
 * @group unit
 */
class GetAllProvincesTaskTest extends UnitTestCase
{
    public function testGetAllProvinces(): void
    {
        Event::fake();
        Province::factory()->count(3)->create();

        $foundProvinces = app(GetAllProvincesTask::class)->run();

        $this->assertCount(3, $foundProvinces);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundProvinces);
        Event::assertDispatched(ProvincesListedEvent::class);
    }
}
