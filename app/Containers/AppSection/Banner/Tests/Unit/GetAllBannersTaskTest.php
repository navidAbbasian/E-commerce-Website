<?php

namespace App\Containers\AppSection\Banner\Tests\Unit;

use App\Containers\AppSection\Banner\Events\BannersListedEvent;
use App\Containers\AppSection\Banner\Models\Banner;
use App\Containers\AppSection\Banner\Tasks\GetAllBannersTask;
use App\Containers\AppSection\Banner\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * Class GetAllBannersTaskTest.
 *
 * @group banner
 * @group unit
 */
class GetAllBannersTaskTest extends UnitTestCase
{
    public function testGetAllBanners(): void
    {
        Event::fake();
        Banner::factory()->count(3)->create();

        $foundBanners = app(GetAllBannersTask::class)->run();

        $this->assertCount(3, $foundBanners);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundBanners);
        Event::assertDispatched(BannersListedEvent::class);
    }
}
