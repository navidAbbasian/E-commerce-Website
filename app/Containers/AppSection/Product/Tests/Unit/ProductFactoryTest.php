<?php

namespace App\Containers\AppSection\Product\Tests\Unit;

use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\Product\Tests\UnitTestCase;

/**
 * Class ProductFactoryTest.
 *
 * @group product
 * @group unit
 */
class ProductFactoryTest extends UnitTestCase
{
    public function testCreateProduct(): void
    {
        $product = Product::factory()->make();

        $this->assertInstanceOf(Product::class, $product);
    }
}
