<?php

namespace App\Containers\AppSection\Product\UI\API\Tests\Functional;

use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\Product\UI\API\Tests\ApiTestCase;

/**
 * Class DeleteProductTest.
 *
 * @group product
 * @group api
 */
class DeleteProductTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/products/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingProduct(): void
    {
        $product = Product::factory()->create();

        $response = $this->injectId($product->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingProduct(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGivenHaveNoAccess_CannotDeleteProduct(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        $product = Product::factory()->create();
//
//        $response = $this->injectId($product->id)->makeCall();
//
//        $response->assertStatus(403);
//    }
}
