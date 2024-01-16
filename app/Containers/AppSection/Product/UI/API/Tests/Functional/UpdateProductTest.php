<?php

namespace App\Containers\AppSection\Product\UI\API\Tests\Functional;

use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\Product\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class UpdateProductTest.
 *
 * @group product
 * @group api
 */
class UpdateProductTest extends ApiTestCase
{
    protected string $endpoint = 'patch@v1/products/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    // TODO TEST
    public function testUpdateExistingProduct(): void
    {
        $product = Product::factory()->create([
            // 'some_field' => 'new_field_value',
        ]);
        $data = [
            // 'some_field' => 'new_field_value',
        ];

        $response = $this->injectId($product->id)->makeCall($data);

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.object', 'Product')
                    ->where('data.id', $product->getHashedKey())
                    // ->where('data.some_field', $data['some_field'])
                    ->etc()
        );
    }

    public function testUpdateNonExistingProduct(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
//    public function testUpdateExistingProductWithEmptyValues(): void
//    {
//        $product = Product::factory()->create();
//        $data = [
//            // add some fillable fields here
//            // 'first_field' => '',
//            // 'second_field' => '',
//        ];
//
//        $response = $this->injectId($product->id)->makeCall($data);
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
