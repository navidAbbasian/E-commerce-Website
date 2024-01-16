<?php

namespace App\Containers\AppSection\Province\Tests\Unit;

use App\Containers\AppSection\Province\Events\ProvinceCreatedEvent;
use App\Containers\AppSection\Province\Tasks\CreateProvinceTask;
use App\Containers\AppSection\Province\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * Class CreateProvinceTaskTest.
 *
 * @group province
 * @group unit
 */
class CreateProvinceTaskTest extends UnitTestCase
{
    public function testCreateProvince(): void
    {
        Event::fake();
        $data = [];

        $province = app(CreateProvinceTask::class)->run($data);

        $this->assertModelExists($province);
        Event::assertDispatched(ProvinceCreatedEvent::class);
    }

    // TODO TEST
//    public function testCreateProvinceWithInvalidData(): void
//    {
//        $this->expectException(CreateResourceFailedException::class);
//
//        $data = [
//            // put some invalid data here
//            // 'invalid' => 'data',
//        ];
//
//        app(CreateProvinceTask::class)->run($data);
//    }
}
