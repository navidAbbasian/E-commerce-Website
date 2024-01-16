<?php

namespace App\Containers\AppSection\Cart\UI\API\Tests\Functional;

use App\Containers\AppSection\Cart\Models\Cart;
use App\Containers\AppSection\Cart\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class GetAllCartsTest.
 *
 * @group cart
 * @group api
 */
class GetAllCartsTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/carts';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testGetAllCartsByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        Cart::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGetAllCartsByNonAdmin(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        Cart::factory()->count(2)->create();
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
//    public function testSearchCartsByFields(): void
//    {
//        Cart::factory()->count(3)->create();
//        // create a model with specific field values
//        $cart = Cart::factory()->create([
//            // 'name' => 'something',
//        ]);
//
//        // search by the above values
//        $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($cart->name))->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('data')
//                    // ->where('data.0.name', $cart->name)
//                    ->etc()
//        );
//    }

    public function testSearchCartsByHashID(): void
    {
        $carts = Cart::factory()->count(3)->create();
        $secondCart = $carts[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondCart->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondCart->getHashedKey())
                    ->etc()
        );
    }
}
