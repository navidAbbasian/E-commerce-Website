<?php

namespace App\Containers\AppSection\WishList\Tests\Unit;

use App\Containers\AppSection\WishList\Events\WishListItemsListedEvent;
use App\Containers\AppSection\WishList\Models\WishListItem;
use App\Containers\AppSection\WishList\Tasks\GetAllWishListItemsTask;
use App\Containers\AppSection\WishList\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * Class GetAllWishListItemsTaskTest.
 *
 * @group wishlistitem
 * @group unit
 */
class GetAllWishListItemsTaskTest extends UnitTestCase
{
    public function testGetAllWishListItems(): void
    {
        Event::fake();
        WishListItem::factory()->count(3)->create();

        $foundWishListItems = app(GetAllWishListItemsTask::class)->run();

        $this->assertCount(3, $foundWishListItems);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundWishListItems);
        Event::assertDispatched(WishListItemsListedEvent::class);
    }
}
