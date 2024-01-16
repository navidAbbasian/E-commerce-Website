<?php

namespace App\Containers\AppSection\WishList\UI\API\Tests\Functional;

use App\Containers\AppSection\WishList\Models\WishList;
use App\Containers\AppSection\WishList\UI\API\Tests\ApiTestCase;
use Hashids;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class FindWishListByIdTest.
 *
 * @group wishlist
 * @group api
 */
class FindWishListByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/wish-lists/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindWishList(): void
    {
        $wishList = WishList::factory()->create();

        $response = $this->injectId($wishList->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', Hashids::encode($wishList->id))
                    ->etc()
        );
    }

    public function testFindNonExistingWishList(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredWishListResponse(): void
    {
        $wishList = WishList::factory()->create();

        $response = $this->injectId($wishList->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $wishList->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
//    public function testFindWishListWithRelation(): void
//    {
//        $wishList = WishListController::factory()->create();
//        $relation = 'roles';
//
//        $response = $this->injectId($wishList->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//              $json->has('data')
//                  ->where('data.id', $wishList->getHashedKey())
//                  ->count("data.$relation.data", 1)
//                  ->where("data.$relation.data.0.name", 'something')
//                  ->etc()
//        );
//    }
}
