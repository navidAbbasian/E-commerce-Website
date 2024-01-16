<?php

namespace App\Containers\AppSection\Customer\Tests\Unit;

use App\Containers\AppSection\Customer\Events\CustomerCreatedEvent;
use App\Containers\AppSection\Customer\Tasks\CreateCustomerTask;
use App\Containers\AppSection\Customer\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * Class CreateCustomerTaskTest.
 *
 * @group customer
 * @group unit
 */
class CreateCustomerTaskTest extends UnitTestCase
{
    public function testCreateCustomer(): void
    {
        Event::fake();
        $data = [];

        $customer = app(CreateCustomerTask::class)->run($data);

        $this->assertModelExists($customer);
        Event::assertDispatched(CustomerCreatedEvent::class);
    }

    // TODO TEST
//    public function testCreateCustomerWithInvalidData(): void
//    {
//        $this->expectException(CreateResourceFailedException::class);
//
//        $data = [
//            // put some invalid data here
//            // 'invalid' => 'data',
//        ];
//
//        app(CreateCustomerTask::class)->run($data);
//    }
}
