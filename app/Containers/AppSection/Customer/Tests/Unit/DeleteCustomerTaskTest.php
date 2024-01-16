<?php

namespace App\Containers\AppSection\Customer\Tests\Unit;

use App\Containers\AppSection\Customer\Events\CustomerDeletedEvent;
use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Tasks\DeleteCustomerTask;
use App\Containers\AppSection\Customer\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class DeleteCustomerTaskTest.
 *
 * @group customer
 * @group unit
 */
class DeleteCustomerTaskTest extends UnitTestCase
{
    public function testDeleteCustomer(): void
    {
        Event::fake();
        $customer = Customer::factory()->create();

        $result = app(DeleteCustomerTask::class)->run($customer->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(CustomerDeletedEvent::class);
    }

    public function testDeleteCustomerWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeleteCustomerTask::class)->run($noneExistingId);
    }
}
