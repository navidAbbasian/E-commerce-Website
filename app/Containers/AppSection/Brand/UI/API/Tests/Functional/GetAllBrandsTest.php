<?php

namespace App\Containers\AppSection\Brand\UI\API\Tests\Functional;

use App\Containers\AppSection\Brand\Models\Brand;
use App\Containers\AppSection\Brand\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class GetAllBrandsTest.
 *
 * @group brand
 * @group api
 */
class GetAllBrandsTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/brands';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testGetAllBrandsByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        Brand::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGetAllBrandsByNonAdmin(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        Brand::factory()->count(2)->create();
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
//    public function testSearchBrandsByFields(): void
//    {
//        Brand::factory()->count(3)->create();
//        // create a model with specific field values
//        $brand = Brand::factory()->create([
//            // 'name' => 'something',
//        ]);
//
//        // search by the above values
//        $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($brand->name))->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('data')
//                    // ->where('data.0.name', $brand->name)
//                    ->etc()
//        );
//    }

    public function testSearchBrandsByHashID(): void
    {
        $brands = Brand::factory()->count(3)->create();
        $secondBrand = $brands[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondBrand->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondBrand->getHashedKey())
                    ->etc()
        );
    }
}
