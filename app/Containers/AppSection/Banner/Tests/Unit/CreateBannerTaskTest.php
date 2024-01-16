<?php

namespace App\Containers\AppSection\Banner\Tests\Unit;

use App\Containers\AppSection\Banner\Events\BannerCreatedEvent;
use App\Containers\AppSection\Banner\Tasks\CreateBannerTask;
use App\Containers\AppSection\Banner\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * Class CreateBannerTaskTest.
 *
 * @group banner
 * @group unit
 */
class CreateBannerTaskTest extends UnitTestCase
{
    public function testCreateBanner(): void
    {
        Event::fake();
        $data = [];

        $banner = app(CreateBannerTask::class)->run($data);

        $this->assertModelExists($banner);
        Event::assertDispatched(BannerCreatedEvent::class);
    }

    // TODO TEST
//    public function testCreateBannerWithInvalidData(): void
//    {
//        $this->expectException(CreateResourceFailedException::class);
//
//        $data = [
//            // put some invalid data here
//            // 'invalid' => 'data',
//        ];
//
//        app(CreateBannerTask::class)->run($data);
//    }
}
