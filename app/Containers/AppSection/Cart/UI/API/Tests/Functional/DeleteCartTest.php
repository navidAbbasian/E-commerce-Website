<?php

namespace App\Containers\AppSection\Cart\UI\API\Tests\Functional;

use App\Containers\AppSection\Cart\Models\Cart;
use App\Containers\AppSection\Cart\UI\API\Tests\ApiTestCase;

/**
 * Class DeleteCartTest.
 *
 * @group cart
 * @group api
 */
class DeleteCartTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/carts/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingCart(): void
    {
        $cart = Cart::factory()->create();

        $response = $this->injectId($cart->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingCart(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGivenHaveNoAccess_CannotDeleteCart(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        $cart = Cart::factory()->create();
//
//        $response = $this->injectId($cart->id)->makeCall();
//
//        $response->assertStatus(403);
//    }
}
