<?php

namespace App\Containers\AppSection\WishList\UI\API\Tests\Functional;

use App\Containers\AppSection\WishList\Models\WishListItem;
use App\Containers\AppSection\WishList\UI\API\Tests\ApiTestCase;

/**
 * Class DeleteWishListItemTest.
 *
 * @group wishlistitem
 * @group api
 */
class DeleteWishListItemTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/wish-list-items/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingWishListItem(): void
    {
        $wishListItem = WishListItem::factory()->create();

        $response = $this->injectId($wishListItem->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingWishListItem(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGivenHaveNoAccess_CannotDeleteWishListItem(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        $wishListItem = WishListItem::factory()->create();
//
//        $response = $this->injectId($wishListItem->id)->makeCall();
//
//        $response->assertStatus(403);
//    }
}
