<?php

namespace App\Containers\AppSection\Brand\UI\API\Tests\Functional;

use App\Containers\AppSection\Brand\Models\Brand;
use App\Containers\AppSection\Brand\UI\API\Tests\ApiTestCase;
use Hashids;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class FindBrandByIdTest.
 *
 * @group brand
 * @group api
 */
class FindBrandByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/brands/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindBrand(): void
    {
        $brand = Brand::factory()->create();

        $response = $this->injectId($brand->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', Hashids::encode($brand->id))
                    ->etc()
        );
    }

    public function testFindNonExistingBrand(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredBrandResponse(): void
    {
        $brand = Brand::factory()->create();

        $response = $this->injectId($brand->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $brand->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
//    public function testFindBrandWithRelation(): void
//    {
//        $brand = Brand::factory()->create();
//        $relation = 'roles';
//
//        $response = $this->injectId($brand->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//              $json->has('data')
//                  ->where('data.id', $brand->getHashedKey())
//                  ->count("data.$relation.data", 1)
//                  ->where("data.$relation.data.0.name", 'something')
//                  ->etc()
//        );
//    }
}
