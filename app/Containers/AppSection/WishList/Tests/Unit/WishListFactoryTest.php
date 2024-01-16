<?php

namespace App\Containers\AppSection\WishList\Tests\Unit;

use App\Containers\AppSection\WishList\Models\WishList;
use App\Containers\AppSection\WishList\Tests\UnitTestCase;

/**
 * Class WishListFactoryTest.
 *
 * @group wishlist
 * @group unit
 */
class WishListFactoryTest extends UnitTestCase
{
    public function testCreateWishList(): void
    {
        $wishList = WishList::factory()->make();

        $this->assertInstanceOf(WishList::class, $wishList);
    }
}
