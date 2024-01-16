<?php

namespace App\Containers\AppSection\Brand\Tests\Unit;

use App\Containers\AppSection\Brand\Events\BrandCreatedEvent;
use App\Containers\AppSection\Brand\Tasks\CreateBrandTask;
use App\Containers\AppSection\Brand\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * Class CreateBrandTaskTest.
 *
 * @group brand
 * @group unit
 */
class CreateBrandTaskTest extends UnitTestCase
{
    public function testCreateBrand(): void
    {
        Event::fake();
        $data = [];

        $brand = app(CreateBrandTask::class)->run($data);

        $this->assertModelExists($brand);
        Event::assertDispatched(BrandCreatedEvent::class);
    }

    // TODO TEST
//    public function testCreateBrandWithInvalidData(): void
//    {
//        $this->expectException(CreateResourceFailedException::class);
//
//        $data = [
//            // put some invalid data here
//            // 'invalid' => 'data',
//        ];
//
//        app(CreateBrandTask::class)->run($data);
//    }
}
