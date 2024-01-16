<?php

namespace App\Containers\AppSection\Customer\Tests\Unit;

use App\Containers\AppSection\Customer\Events\CustomerUpdatedEvent;
use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\Tasks\UpdateCustomerTask;
use App\Containers\AppSection\Customer\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class UpdateCustomerTaskTest.
 *
 * @group customer
 * @group unit
 */
class UpdateCustomerTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateCustomer(): void
    {
        Event::fake();
        $customer = Customer::factory()->create();
        $data = [
            // add some fillable fields here
            // 'some_field' => 'new_field_data',
        ];

        $updatedCustomer = app(UpdateCustomerTask::class)->run($data, $customer->id);

        $this->assertEquals($customer->id, $updatedCustomer->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedCustomer->some_field);
        Event::assertDispatched(CustomerUpdatedEvent::class);
    }

    public function testUpdateCustomerWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdateCustomerTask::class)->run([], $noneExistingId);
    }
}
