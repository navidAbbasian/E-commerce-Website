<?php

namespace App\Containers\AppSection\Shop\Tests\Unit;

use App\Containers\AppSection\Shop\Events\ShopFoundByIdEvent;
use App\Containers\AppSection\Shop\Models\Shop;
use App\Containers\AppSection\Shop\Tasks\FindShopByIdTask;
use App\Containers\AppSection\Shop\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class FindShopByIdTaskTest.
 *
 * @group shop
 * @group unit
 */
class FindShopByIdTaskTest extends UnitTestCase
{
    public function testFindShopById(): void
    {
        Event::fake();
        $shop = Shop::factory()->create();

        $foundShop = app(FindShopByIdTask::class)->run($shop->id);

        $this->assertEquals($shop->id, $foundShop->id);
        Event::assertDispatched(ShopFoundByIdEvent::class);
    }

    public function testFindShopWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindShopByIdTask::class)->run($noneExistingId);
    }
}
