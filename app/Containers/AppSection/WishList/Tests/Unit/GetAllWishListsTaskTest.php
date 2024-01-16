<?php

namespace App\Containers\AppSection\WishList\Tests\Unit;

use App\Containers\AppSection\WishList\Events\WishListsListedEvent;
use App\Containers\AppSection\WishList\Models\WishList;
use App\Containers\AppSection\WishList\Tasks\GetAllWishListsTask;
use App\Containers\AppSection\WishList\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * Class GetAllWishListsTaskTest.
 *
 * @group wishlist
 * @group unit
 */
class GetAllWishListsTaskTest extends UnitTestCase
{
    public function testGetAllWishLists(): void
    {
        Event::fake();
        WishList::factory()->count(3)->create();

        $foundWishLists = app(GetAllWishListsTask::class)->run();

        $this->assertCount(3, $foundWishLists);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundWishLists);
        Event::assertDispatched(WishListsListedEvent::class);
    }
}
