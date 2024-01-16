<?php

namespace App\Containers\AppSection\Cart\Tests\Unit;

use App\Containers\AppSection\Cart\Models\Cart;
use App\Containers\AppSection\Cart\Tests\UnitTestCase;

/**
 * Class CartFactoryTest.
 *
 * @group cart
 * @group unit
 */
class CartFactoryTest extends UnitTestCase
{
    public function testCreateCart(): void
    {
        $cart = Cart::factory()->make();

        $this->assertInstanceOf(Cart::class, $cart);
    }
}
