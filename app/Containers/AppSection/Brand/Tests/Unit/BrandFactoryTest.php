<?php

namespace App\Containers\AppSection\Brand\Tests\Unit;

use App\Containers\AppSection\Brand\Models\Brand;
use App\Containers\AppSection\Brand\Tests\UnitTestCase;

/**
 * Class BrandFactoryTest.
 *
 * @group brand
 * @group unit
 */
class BrandFactoryTest extends UnitTestCase
{
    public function testCreateBrand(): void
    {
        $brand = Brand::factory()->make();

        $this->assertInstanceOf(Brand::class, $brand);
    }
}
