<?php

namespace App\Containers\AppSection\Shop\UI\API\Tests\Functional;

use App\Containers\AppSection\Shop\Models\Shop;
use App\Containers\AppSection\Shop\UI\API\Tests\ApiTestCase;
use Hashids;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class FindShopByIdTest.
 *
 * @group shop
 * @group api
 */
class FindShopByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/shops/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindShop(): void
    {
        $shop = Shop::factory()->create();

        $response = $this->injectId($shop->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', Hashids::encode($shop->id))
                    ->etc()
        );
    }

    public function testFindNonExistingShop(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredShopResponse(): void
    {
        $shop = Shop::factory()->create();

        $response = $this->injectId($shop->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $shop->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
//    public function testFindShopWithRelation(): void
//    {
//        $shop = Shop::factory()->create();
//        $relation = 'roles';
//
//        $response = $this->injectId($shop->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//              $json->has('data')
//                  ->where('data.id', $shop->getHashedKey())
//                  ->count("data.$relation.data", 1)
//                  ->where("data.$relation.data.0.name", 'something')
//                  ->etc()
//        );
//    }
}
