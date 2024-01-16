<?php

namespace App\Containers\AppSection\Customer\UI\API\Tests\Functional;

use App\Containers\AppSection\Customer\Models\Customer;
use App\Containers\AppSection\Customer\UI\API\Tests\ApiTestCase;
use Hashids;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class FindCustomerByIdTest.
 *
 * @group customer
 * @group api
 */
class FindCustomerByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/customers/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindCustomer(): void
    {
        $customer = Customer::factory()->create();

        $response = $this->injectId($customer->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', Hashids::encode($customer->id))
                    ->etc()
        );
    }

    public function testFindNonExistingCustomer(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredCustomerResponse(): void
    {
        $customer = Customer::factory()->create();

        $response = $this->injectId($customer->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $customer->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
//    public function testFindCustomerWithRelation(): void
//    {
//        $customer = Customer::factory()->create();
//        $relation = 'roles';
//
//        $response = $this->injectId($customer->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//              $json->has('data')
//                  ->where('data.id', $customer->getHashedKey())
//                  ->count("data.$relation.data", 1)
//                  ->where("data.$relation.data.0.name", 'something')
//                  ->etc()
//        );
//    }
}
