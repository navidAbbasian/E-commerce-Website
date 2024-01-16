<?php

namespace App\Containers\AppSection\Shop\Tests\Unit;

use App\Containers\AppSection\Shop\Events\ShopUpdatedEvent;
use App\Containers\AppSection\Shop\Models\Shop;
use App\Containers\AppSection\Shop\Tasks\UpdateShopTask;
use App\Containers\AppSection\Shop\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class UpdateShopTaskTest.
 *
 * @group shop
 * @group unit
 */
class UpdateShopTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateShop(): void
    {
        Event::fake();
        $shop = Shop::factory()->create();
        $data = [
            // add some fillable fields here
            // 'some_field' => 'new_field_data',
        ];

        $updatedShop = app(UpdateShopTask::class)->run($data, $shop->id);

        $this->assertEquals($shop->id, $updatedShop->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedShop->some_field);
        Event::assertDispatched(ShopUpdatedEvent::class);
    }

    public function testUpdateShopWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdateShopTask::class)->run([], $noneExistingId);
    }
}
