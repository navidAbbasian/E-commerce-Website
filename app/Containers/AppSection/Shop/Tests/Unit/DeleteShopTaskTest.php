<?php

namespace App\Containers\AppSection\Shop\Tests\Unit;

use App\Containers\AppSection\Shop\Events\ShopDeletedEvent;
use App\Containers\AppSection\Shop\Models\Shop;
use App\Containers\AppSection\Shop\Tasks\DeleteShopTask;
use App\Containers\AppSection\Shop\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class DeleteShopTaskTest.
 *
 * @group shop
 * @group unit
 */
class DeleteShopTaskTest extends UnitTestCase
{
    public function testDeleteShop(): void
    {
        Event::fake();
        $shop = Shop::factory()->create();

        $result = app(DeleteShopTask::class)->run($shop->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(ShopDeletedEvent::class);
    }

    public function testDeleteShopWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeleteShopTask::class)->run($noneExistingId);
    }
}
