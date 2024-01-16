<?php

namespace App\Containers\AppSection\Banner\Tests\Unit;

use App\Containers\AppSection\Banner\Models\Banner;
use App\Containers\AppSection\Banner\Tests\UnitTestCase;

/**
 * Class BannerFactoryTest.
 *
 * @group banner
 * @group unit
 */
class BannerFactoryTest extends UnitTestCase
{
    public function testCreateBanner(): void
    {
        $banner = Banner::factory()->make();

        $this->assertInstanceOf(Banner::class, $banner);
    }
}
