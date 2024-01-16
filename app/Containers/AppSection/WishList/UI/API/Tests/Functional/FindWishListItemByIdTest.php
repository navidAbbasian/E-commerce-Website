<?php

namespace App\Containers\AppSection\WishList\UI\API\Tests\Functional;

use App\Containers\AppSection\WishList\Models\WishListItem;
use App\Containers\AppSection\WishList\UI\API\Tests\ApiTestCase;
use Hashids\Hashids;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class FindWishListItemByIdTest.
 *
 * @group wishlistitem
 * @group api
 */
class FindWishListItemByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/wish-list-items/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindWishListItem(): void
    {
        $wishListItem = WishListItem::factory()->create();

        $response = $this->injectId($wishListItem->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) => $json->has('data')
                    ->where('data.id', Hashids::encode($wishListItem->id))
                    ->etc()
        );
    }

    public function testFindNonExistingWishListItem(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredWishListItemResponse(): void
    {
        $wishListItem = WishListItem::factory()->create();

        $response = $this->injectId($wishListItem->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) => $json->has('data')
                    ->where('data.id', $wishListItem->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
    //    public function testFindWishListItemWithRelation(): void
    //    {
    //        $wishListItem = WishListItem::factory()->create();
    //        $relation = 'roles';
    //
    //        $response = $this->injectId($wishListItem->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
    //
    //        $response->assertStatus(200);
    //        $response->assertJson(
    //            fn (AssertableJson $json) =>
    //              $json->has('data')
    //                  ->where('data.id', $wishListItem->getHashedKey())
    //                  ->count("data.$relation.data", 1)
    //                  ->where("data.$relation.data.0.name", 'something')
    //                  ->etc()
    //        );
    //    }
}
