<?php

namespace App\Containers\AppSection\Customer\Tests\Unit;

use App\Containers\AppSection\Customer\Events\CustomerFoundByIdEvent;
use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Tasks\FindCustomerByIdTask;
use App\Containers\AppSection\Customer\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class FindCustomerByIdTaskTest.
 *
 * @group customer
 * @group unit
 */
class FindCustomerByIdTaskTest extends UnitTestCase
{
    public function testFindCustomerById(): void
    {
        Event::fake();
        $customer = Customer::factory()->create();

        $foundCustomer = app(FindCustomerByIdTask::class)->run($customer->id);

        $this->assertEquals($customer->id, $foundCustomer->id);
        Event::assertDispatched(CustomerFoundByIdEvent::class);
    }

    public function testFindCustomerWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindCustomerByIdTask::class)->run($noneExistingId);
    }
}
