<?php

namespace App\Containers\AppSection\Customer\UI\API\Tests\Functional;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class GetAllCustomersTest.
 *
 * @group customer
 * @group api
 */
class GetAllCustomersTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/customers';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testGetAllCustomersByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        Customer::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGetAllCustomersByNonAdmin(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        Customer::factory()->count(2)->create();
//
//        $response = $this->makeCall();
//
//        $response->assertStatus(403);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('message')
//                    ->where('message', 'This action is unauthorized.')
//                    ->etc()
//        );
//    }

    // TODO TEST
//    public function testSearchCustomersByFields(): void
//    {
//        Customer::factory()->count(3)->create();
//        // create a model with specific field values
//        $customer = Customer::factory()->create([
//            // 'name' => 'something',
//        ]);
//
//        // search by the above values
//        $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($customer->name))->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('data')
//                    // ->where('data.0.name', $customer->name)
//                    ->etc()
//        );
//    }

    public function testSearchCustomersByHashID(): void
    {
        $customers = Customer::factory()->count(3)->create();
        $secondCustomer = $customers[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondCustomer->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondCustomer->getHashedKey())
                    ->etc()
        );
    }
}
