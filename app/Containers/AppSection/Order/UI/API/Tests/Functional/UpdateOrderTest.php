<?php

namespace App\Containers\AppSection\Order\UI\API\Tests\Functional;

use App\Containers\AppSection\Order\Models\Order;
use App\Containers\AppSection\Order\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class UpdateOrderTest.
 *
 * @group order
 * @group api
 */
class UpdateOrderTest extends ApiTestCase
{
    protected string $endpoint = 'patch@v1/orders/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    // TODO TEST
    public function testUpdateExistingOrder(): void
    {
        $order = Order::factory()->create([
            // 'some_field' => 'new_field_value',
        ]);
        $data = [
            // 'some_field' => 'new_field_value',
        ];

        $response = $this->injectId($order->id)->makeCall($data);

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.object', 'Order')
                    ->where('data.id', $order->getHashedKey())
                    // ->where('data.some_field', $data['some_field'])
                    ->etc()
        );
    }

    public function testUpdateNonExistingOrder(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
//    public function testUpdateExistingOrderWithEmptyValues(): void
//    {
//        $order = Order::factory()->create();
//        $data = [
//            // add some fillable fields here
//            // 'first_field' => '',
//            // 'second_field' => '',
//        ];
//
//        $response = $this->injectId($order->id)->makeCall($data);
//
//        $response->assertStatus(422);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//            $json->has('errors')
//                // ->where('errors.first_field.0', 'assert validation errors')
//                // ->where('errors.second_field.0', 'assert validation errors')
//                ->etc()
//        );
//    }
}
