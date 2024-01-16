<?php

namespace App\Containers\AppSection\Shop\Tests\Unit;

use App\Containers\AppSection\Shop\Models\Shop;
use App\Containers\AppSection\Shop\Tests\UnitTestCase;

/**
 * Class ShopFactoryTest.
 *
 * @group shop
 * @group unit
 */
class ShopFactoryTest extends UnitTestCase
{
    public function testCreateShop(): void
    {
        $shop = Shop::factory()->make();

        $this->assertInstanceOf(Shop::class, $shop);
    }
}
