<?php

namespace App\Containers\AppSection\Customer\Tests\Unit;

use App\Containers\AppSection\Customer\Events\CustomersListedEvent;
use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Tasks\GetAllCustomersTask;
use App\Containers\AppSection\Customer\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * Class GetAllCustomersTaskTest.
 *
 * @group customer
 * @group unit
 */
class GetAllCustomersTaskTest extends UnitTestCase
{
    public function testGetAllCustomers(): void
    {
        Event::fake();
        Customer::factory()->count(3)->create();

        $foundCustomers = app(GetAllCustomersTask::class)->run();

        $this->assertCount(3, $foundCustomers);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundCustomers);
        Event::assertDispatched(CustomersListedEvent::class);
    }
}
