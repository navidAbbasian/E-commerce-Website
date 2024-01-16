<?php

namespace App\Containers\AppSection\Order\Tests\Unit;

use App\Containers\AppSection\Order\Models\Order;
use App\Containers\AppSection\Order\Tests\UnitTestCase;

/**
 * Class OrderFactoryTest.
 *
 * @group order
 * @group unit
 */
class OrderFactoryTest extends UnitTestCase
{
    public function testCreateOrder(): void
    {
        $order = Order::factory()->make();

        $this->assertInstanceOf(Order::class, $order);
    }
}
