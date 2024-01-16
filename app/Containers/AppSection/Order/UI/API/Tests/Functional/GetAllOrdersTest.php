<?php

namespace App\Containers\AppSection\Order\UI\API\Tests\Functional;

use App\Containers\AppSection\Order\Models\Order;
use App\Containers\AppSection\Order\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class GetAllOrdersTest.
 *
 * @group order
 * @group api
 */
class GetAllOrdersTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/orders';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testGetAllOrdersByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        Order::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGetAllOrdersByNonAdmin(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        Order::factory()->count(2)->create();
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
//    public function testSearchOrdersByFields(): void
//    {
//        Order::factory()->count(3)->create();
//        // create a model with specific field values
//        $order = Order::factory()->create([
//            // 'name' => 'something',
//        ]);
//
//        // search by the above values
//        $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($order->name))->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('data')
//                    // ->where('data.0.name', $order->name)
//                    ->etc()
//        );
//    }

    public function testSearchOrdersByHashID(): void
    {
        $orders = Order::factory()->count(3)->create();
        $secondOrder = $orders[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondOrder->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondOrder->getHashedKey())
                    ->etc()
        );
    }
}
