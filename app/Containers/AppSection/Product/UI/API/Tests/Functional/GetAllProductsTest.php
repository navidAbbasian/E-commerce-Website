<?php

namespace App\Containers\AppSection\Product\UI\API\Tests\Functional;

use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\Product\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class GetAllProductsTest.
 *
 * @group product
 * @group api
 */
class GetAllProductsTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/products';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testGetAllProductsByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        Product::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGetAllProductsByNonAdmin(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        Product::factory()->count(2)->create();
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
//    public function testSearchProductsByFields(): void
//    {
//        Product::factory()->count(3)->create();
//        // create a model with specific field values
//        $product = Product::factory()->create([
//            // 'name' => 'something',
//        ]);
//
//        // search by the above values
//        $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($product->name))->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('data')
//                    // ->where('data.0.name', $product->name)
//                    ->etc()
//        );
//    }

    public function testSearchProductsByHashID(): void
    {
        $products = Product::factory()->count(3)->create();
        $secondProduct = $products[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondProduct->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondProduct->getHashedKey())
                    ->etc()
        );
    }
}
