<?php

namespace App\Containers\AppSection\Customer\UI\API\Tests\Functional;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\UI\API\Tests\ApiTestCase;

/**
 * Class DeleteCustomerTest.
 *
 * @group customer
 * @group api
 */
class DeleteCustomerTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/customers/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingCustomer(): void
    {
        $customer = Customer::factory()->create();

        $response = $this->injectId($customer->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingCustomer(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGivenHaveNoAccess_CannotDeleteCustomer(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        $customer = Customer::factory()->create();
//
//        $response = $this->injectId($customer->id)->makeCall();
//
//        $response->assertStatus(403);
//    }
}
