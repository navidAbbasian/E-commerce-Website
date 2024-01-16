<?php

namespace App\Containers\AppSection\Product\UI\API\Tests\Functional;

use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\Product\UI\API\Tests\ApiTestCase;
use Hashids;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class FindProductByIdTest.
 *
 * @group product
 * @group api
 */
class FindProductByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/products/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindProduct(): void
    {
        $product = Product::factory()->create();

        $response = $this->injectId($product->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', Hashids::encode($product->id))
                    ->etc()
        );
    }

    public function testFindNonExistingProduct(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredProductResponse(): void
    {
        $product = Product::factory()->create();

        $response = $this->injectId($product->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $product->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
//    public function testFindProductWithRelation(): void
//    {
//        $product = Product::factory()->create();
//        $relation = 'roles';
//
//        $response = $this->injectId($product->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//              $json->has('data')
//                  ->where('data.id', $product->getHashedKey())
//                  ->count("data.$relation.data", 1)
//                  ->where("data.$relation.data.0.name", 'something')
//                  ->etc()
//        );
//    }
}
