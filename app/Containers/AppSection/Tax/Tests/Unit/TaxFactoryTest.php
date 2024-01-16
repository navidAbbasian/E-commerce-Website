<?php

namespace App\Containers\AppSection\Tax\Tests\Unit;

use App\Containers\AppSection\Tax\Models\Tax;
use App\Containers\AppSection\Tax\Tests\UnitTestCase;

/**
 * Class TaxFactoryTest.
 *
 * @group tax
 * @group unit
 */
class TaxFactoryTest extends UnitTestCase
{
    public function testCreateTax(): void
    {
        $tax = Tax::factory()->make();

        $this->assertInstanceOf(Tax::class, $tax);
    }
}
