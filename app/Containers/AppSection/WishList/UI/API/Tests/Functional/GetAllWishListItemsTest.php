<?php

namespace App\Containers\AppSection\WishList\UI\API\Tests\Functional;

use App\Containers\AppSection\WishList\Models\WishListItem;
use App\Containers\AppSection\WishList\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class GetAllWishListItemsTest.
 *
 * @group wishlistitem
 * @group api
 */
class GetAllWishListItemsTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/wish-list-items';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testGetAllWishListItemsByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        WishListItem::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGetAllWishListItemsByNonAdmin(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        WishListItem::factory()->count(2)->create();
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
//    public function testSearchWishListItemsByFields(): void
//    {
//        WishListItem::factory()->count(3)->create();
//        // create a model with specific field values
//        $wishListItem = WishListItem::factory()->create([
//            // 'name' => 'something',
//        ]);
//
//        // search by the above values
//        $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($wishListItem->name))->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('data')
//                    // ->where('data.0.name', $wishListItem->name)
//                    ->etc()
//        );
//    }

    public function testSearchWishListItemsByHashID(): void
    {
        $wishlistitems = WishListItem::factory()->count(3)->create();
        $secondWishListItem = $wishlistitems[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondWishListItem->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondWishListItem->getHashedKey())
                    ->etc()
        );
    }
}
