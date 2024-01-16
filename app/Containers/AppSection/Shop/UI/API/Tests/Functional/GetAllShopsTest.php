<?php

namespace App\Containers\AppSection\Shop\UI\API\Tests\Functional;

use App\Containers\AppSection\Shop\Models\Shop;
use App\Containers\AppSection\Shop\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class GetAllShopsTest.
 *
 * @group shop
 * @group api
 */
class GetAllShopsTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/shops';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testGetAllShopsByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        Shop::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGetAllShopsByNonAdmin(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        Shop::factory()->count(2)->create();
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
//    public function testSearchShopsByFields(): void
//    {
//        Shop::factory()->count(3)->create();
//        // create a model with specific field values
//        $shop = Shop::factory()->create([
//            // 'name' => 'something',
//        ]);
//
//        // search by the above values
//        $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($shop->name))->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('data')
//                    // ->where('data.0.name', $shop->name)
//                    ->etc()
//        );
//    }

    public function testSearchShopsByHashID(): void
    {
        $shops = Shop::factory()->count(3)->create();
        $secondShop = $shops[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondShop->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondShop->getHashedKey())
                    ->etc()
        );
    }
}
