<?php

namespace App\Containers\AppSection\Discount\Tests\Unit;

use App\Containers\AppSection\Discount\Models\Discount;
use App\Containers\AppSection\Discount\Tests\UnitTestCase;

/**
 * Class DiscountFactoryTest.
 *
 * @group discount
 * @group unit
 */
class DiscountFactoryTest extends UnitTestCase
{
    public function testCreateDiscount(): void
    {
        $discount = Discount::factory()->make();

        $this->assertInstanceOf(Discount::class, $discount);
    }
}
