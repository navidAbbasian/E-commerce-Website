<?php

namespace App\Containers\AppSection\WishList\Tests\Unit;

use App\Containers\AppSection\WishList\Events\WishListFoundByIdEvent;
use App\Containers\AppSection\WishList\Models\WishList;
use App\Containers\AppSection\WishList\Tasks\FindWishListByIdTask;
use App\Containers\AppSection\WishList\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class FindWishListByIdTaskTest.
 *
 * @group wishlist
 * @group unit
 */
class FindWishListByIdTaskTest extends UnitTestCase
{
    public function testFindWishListById(): void
    {
        Event::fake();
        $wishList = WishList::factory()->create();

        $foundWishList = app(FindWishListByIdTask::class)->run($wishList->id);

        $this->assertEquals($wishList->id, $foundWishList->id);
        Event::assertDispatched(WishListFoundByIdEvent::class);
    }

    public function testFindWishListWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindWishListByIdTask::class)->run($noneExistingId);
    }
}
