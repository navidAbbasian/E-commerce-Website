<?php

namespace App\Containers\AppSection\WishList\Tests\Unit;

use App\Containers\AppSection\WishList\Events\WishListItemFoundByIdEvent;
use App\Containers\AppSection\WishList\Models\WishListItem;
use App\Containers\AppSection\WishList\Tasks\FindWishListItemByIdTask;
use App\Containers\AppSection\WishList\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class FindWishListItemByIdTaskTest.
 *
 * @group wishlistitem
 * @group unit
 */
class FindWishListItemByIdTaskTest extends UnitTestCase
{
    public function testFindWishListItemById(): void
    {
        Event::fake();
        $wishListItem = WishListItem::factory()->create();

        $foundWishListItem = app(FindWishListItemByIdTask::class)->run($wishListItem->id);

        $this->assertEquals($wishListItem->id, $foundWishListItem->id);
        Event::assertDispatched(WishListItemFoundByIdEvent::class);
    }

    public function testFindWishListItemWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindWishListItemByIdTask::class)->run($noneExistingId);
    }
}
