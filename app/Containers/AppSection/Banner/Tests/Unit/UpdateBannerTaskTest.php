<?php

namespace App\Containers\AppSection\Banner\Tests\Unit;

use App\Containers\AppSection\Banner\Events\BannerUpdatedEvent;
use App\Containers\AppSection\Banner\Models\Banner;
use App\Containers\AppSection\Banner\Tasks\UpdateBannerTask;
use App\Containers\AppSection\Banner\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class UpdateBannerTaskTest.
 *
 * @group banner
 * @group unit
 */
class UpdateBannerTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateBanner(): void
    {
        Event::fake();
        $banner = Banner::factory()->create();
        $data = [
            // add some fillable fields here
            // 'some_field' => 'new_field_data',
        ];

        $updatedBanner = app(UpdateBannerTask::class)->run($data, $banner->id);

        $this->assertEquals($banner->id, $updatedBanner->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedBanner->some_field);
        Event::assertDispatched(BannerUpdatedEvent::class);
    }

    public function testUpdateBannerWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdateBannerTask::class)->run([], $noneExistingId);
    }
}
