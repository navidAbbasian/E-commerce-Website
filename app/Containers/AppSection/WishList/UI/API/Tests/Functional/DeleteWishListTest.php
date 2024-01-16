<?php

namespace App\Containers\AppSection\WishList\UI\API\Tests\Functional;

use App\Containers\AppSection\WishList\Models\WishList;
use App\Containers\AppSection\WishList\UI\API\Tests\ApiTestCase;

/**
 * Class DeleteWishListTest.
 *
 * @group wishlist
 * @group api
 */
class DeleteWishListTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/wish-lists/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingWishList(): void
    {
        $wishList = WishList::factory()->create();

        $response = $this->injectId($wishList->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingWishList(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGivenHaveNoAccess_CannotDeleteWishList(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        $wishList = WishListController::factory()->create();
//
//        $response = $this->injectId($wishList->id)->makeCall();
//
//        $response->assertStatus(403);
//    }
}
