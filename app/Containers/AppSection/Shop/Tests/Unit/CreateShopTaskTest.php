<?php

namespace App\Containers\AppSection\Shop\Tests\Unit;

use App\Containers\AppSection\Shop\Events\ShopCreatedEvent;
use App\Containers\AppSection\Shop\Tasks\CreateShopTask;
use App\Containers\AppSection\Shop\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * Class CreateShopTaskTest.
 *
 * @group shop
 * @group unit
 */
class CreateShopTaskTest extends UnitTestCase
{
    public function testCreateShop(): void
    {
        Event::fake();
        $data = [];

        $shop = app(CreateShopTask::class)->run($data);

        $this->assertModelExists($shop);
        Event::assertDispatched(ShopCreatedEvent::class);
    }

    // TODO TEST
//    public function testCreateShopWithInvalidData(): void
//    {
//        $this->expectException(CreateResourceFailedException::class);
//
//        $data = [
//            // put some invalid data here
//            // 'invalid' => 'data',
//        ];
//
//        app(CreateShopTask::class)->run($data);
//    }
}
