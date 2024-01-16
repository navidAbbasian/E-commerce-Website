<?php

namespace App\Containers\AppSection\Banner\Tests\Unit;

use App\Containers\AppSection\Banner\Events\BannerFoundByIdEvent;
use App\Containers\AppSection\Banner\Models\Banner;
use App\Containers\AppSection\Banner\Tasks\FindBannerByIdTask;
use App\Containers\AppSection\Banner\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class FindBannerByIdTaskTest.
 *
 * @group banner
 * @group unit
 */
class FindBannerByIdTaskTest extends UnitTestCase
{
    public function testFindBannerById(): void
    {
        Event::fake();
        $banner = Banner::factory()->create();

        $foundBanner = app(FindBannerByIdTask::class)->run($banner->id);

        $this->assertEquals($banner->id, $foundBanner->id);
        Event::assertDispatched(BannerFoundByIdEvent::class);
    }

    public function testFindBannerWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindBannerByIdTask::class)->run($noneExistingId);
    }
}
