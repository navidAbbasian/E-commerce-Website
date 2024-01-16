<?php

namespace App\Containers\AppSection\Customer\Tests\Unit;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Tests\UnitTestCase;

/**
 * Class CustomerFactoryTest.
 *
 * @group customer
 * @group unit
 */
class CustomerFactoryTest extends UnitTestCase
{
    public function testCreateCustomer(): void
    {
        $customer = Customer::factory()->make();

        $this->assertInstanceOf(Customer::class, $customer);
    }
}
