<?php

namespace App\Containers\AppSection\WishList\Tests\Unit;

use App\Containers\AppSection\WishList\Models\WishListItem;
use App\Containers\AppSection\WishList\Tests\UnitTestCase;

/**
 * Class WishListItemFactoryTest.
 *
 * @group wishlistitem
 * @group unit
 */
class WishListItemFactoryTest extends UnitTestCase
{
    public function testCreateWishListItem(): void
    {
        $wishListItem = WishListItem::factory()->make();

        $this->assertInstanceOf(WishListItem::class, $wishListItem);
    }
}
