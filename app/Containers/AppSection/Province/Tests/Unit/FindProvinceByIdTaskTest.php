<?php

namespace App\Containers\AppSection\Province\Tests\Unit;

use App\Containers\AppSection\Province\Events\ProvinceFoundByIdEvent;
use App\Containers\AppSection\Province\Models\Province;
use App\Containers\AppSection\Province\Tasks\FindProvinceByIdTask;
use App\Containers\AppSection\Province\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class FindProvinceByIdTaskTest.
 *
 * @group province
 * @group unit
 */
class FindProvinceByIdTaskTest extends UnitTestCase
{
    public function testFindProvinceById(): void
    {
        Event::fake();
        $province = Province::factory()->create();

        $foundProvince = app(FindProvinceByIdTask::class)->run($province->id);

        $this->assertEquals($province->id, $foundProvince->id);
        Event::assertDispatched(ProvinceFoundByIdEvent::class);
    }

    public function testFindProvinceWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindProvinceByIdTask::class)->run($noneExistingId);
    }
}
