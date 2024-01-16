<?php

namespace App\Containers\AppSection\Order\UI\API\Tests\Functional;

use App\Containers\AppSection\Order\Models\Order;
use App\Containers\AppSection\Order\UI\API\Tests\ApiTestCase;

/**
 * Class DeleteOrderTest.
 *
 * @group order
 * @group api
 */
class DeleteOrderTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/orders/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingOrder(): void
    {
        $order = Order::factory()->create();

        $response = $this->injectId($order->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingOrder(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGivenHaveNoAccess_CannotDeleteOrder(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        $order = Order::factory()->create();
//
//        $response = $this->injectId($order->id)->makeCall();
//
//        $response->assertStatus(403);
//    }
}
