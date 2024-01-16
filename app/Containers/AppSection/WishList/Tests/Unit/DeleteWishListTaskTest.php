<?php

namespace App\Containers\AppSection\WishList\Tests\Unit;

use App\Containers\AppSection\WishList\Events\WishListDeletedEvent;
use App\Containers\AppSection\WishList\Models\WishList;
use App\Containers\AppSection\WishList\Tasks\DeleteWishListTask;
use App\Containers\AppSection\WishList\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class DeleteWishListTaskTest.
 *
 * @group wishlist
 * @group unit
 */
class DeleteWishListTaskTest extends UnitTestCase
{
    public function testDeleteWishList(): void
    {
        Event::fake();
        $wishList = WishList::factory()->create();

        $result = app(DeleteWishListTask::class)->run($wishList->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(WishListDeletedEvent::class);
    }

    public function testDeleteWishListWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeleteWishListTask::class)->run($noneExistingId);
    }
}
