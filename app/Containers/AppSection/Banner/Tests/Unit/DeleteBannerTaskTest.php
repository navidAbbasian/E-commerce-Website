<?php

namespace App\Containers\AppSection\Banner\Tests\Unit;

use App\Containers\AppSection\Banner\Events\BannerDeletedEvent;
use App\Containers\AppSection\Banner\Models\Banner;
use App\Containers\AppSection\Banner\Tasks\DeleteBannerTask;
use App\Containers\AppSection\Banner\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class DeleteBannerTaskTest.
 *
 * @group banner
 * @group unit
 */
class DeleteBannerTaskTest extends UnitTestCase
{
    public function testDeleteBanner(): void
    {
        Event::fake();
        $banner = Banner::factory()->create();

        $result = app(DeleteBannerTask::class)->run($banner->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(BannerDeletedEvent::class);
    }

    public function testDeleteBannerWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeleteBannerTask::class)->run($noneExistingId);
    }
}
