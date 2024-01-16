<?php

namespace App\Containers\AppSection\WishList\Tests\Unit;

use App\Containers\AppSection\WishList\Events\WishListItemDeletedEvent;
use App\Containers\AppSection\WishList\Models\WishListItem;
use App\Containers\AppSection\WishList\Tasks\DeleteWishListItemTask;
use App\Containers\AppSection\WishList\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class DeleteWishListItemTaskTest.
 *
 * @group wishlistitem
 * @group unit
 */
class DeleteWishListItemTaskTest extends UnitTestCase
{
    public function testDeleteWishListItem(): void
    {
        Event::fake();
        $wishListItem = WishListItem::factory()->create();

        $result = app(DeleteWishListItemTask::class)->run($wishListItem->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(WishListItemDeletedEvent::class);
    }

    public function testDeleteWishListItemWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeleteWishListItemTask::class)->run($noneExistingId);
    }
}
