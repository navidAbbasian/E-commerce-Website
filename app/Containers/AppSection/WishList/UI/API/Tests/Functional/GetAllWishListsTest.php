<?php

namespace App\Containers\AppSection\WishList\UI\API\Tests\Functional;

use App\Containers\AppSection\WishList\Models\WishList;
use App\Containers\AppSection\WishList\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class GetAllWishListsTest.
 *
 * @group wishlist
 * @group api
 */
class GetAllWishListsTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/wish-lists';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testGetAllWishListsByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        WishList::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGetAllWishListsByNonAdmin(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        WishListController::factory()->count(2)->create();
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
//    public function testSearchWishListsByFields(): void
//    {
//        WishListController::factory()->count(3)->create();
//        // create a model with specific field values
//        $wishList = WishListController::factory()->create([
//            // 'name' => 'something',
//        ]);
//
//        // search by the above values
//        $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($wishList->name))->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('data')
//                    // ->where('data.0.name', $wishList->name)
//                    ->etc()
//        );
//    }

    public function testSearchWishListsByHashID(): void
    {
        $wishlists = WishList::factory()->count(3)->create();
        $secondWishList = $wishlists[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondWishList->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondWishList->getHashedKey())
                    ->etc()
        );
    }
}
