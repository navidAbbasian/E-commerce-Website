<?php

namespace App\Containers\AppSection\Cart\UI\API\Tests\Functional;

use App\Containers\AppSection\Cart\Models\Cart;
use App\Containers\AppSection\Cart\UI\API\Tests\ApiTestCase;
use Hashids;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class FindCartByIdTest.
 *
 * @group cart
 * @group api
 */
class FindCartByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/carts/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindCart(): void
    {
        $cart = Cart::factory()->create();

        $response = $this->injectId($cart->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', Hashids::encode($cart->id))
                    ->etc()
        );
    }

    public function testFindNonExistingCart(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredCartResponse(): void
    {
        $cart = Cart::factory()->create();

        $response = $this->injectId($cart->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $cart->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
//    public function testFindCartWithRelation(): void
//    {
//        $cart = Cart::factory()->create();
//        $relation = 'roles';
//
//        $response = $this->injectId($cart->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//              $json->has('data')
//                  ->where('data.id', $cart->getHashedKey())
//                  ->count("data.$relation.data", 1)
//                  ->where("data.$relation.data.0.name", 'something')
//                  ->etc()
//        );
//    }
}
