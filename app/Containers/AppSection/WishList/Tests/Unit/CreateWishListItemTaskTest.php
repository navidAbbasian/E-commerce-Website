<?php

namespace App\Containers\AppSection\WishList\Tests\Unit;

use App\Containers\AppSection\WishList\Events\WishListItemCreatedEvent;
use App\Containers\AppSection\WishList\Tasks\CreateWishListItemTask;
use App\Containers\AppSection\WishList\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * Class CreateWishListItemTaskTest.
 *
 * @group wishlistitem
 * @group unit
 */
class CreateWishListItemTaskTest extends UnitTestCase
{
    public function testCreateWishListItem(): void
    {
        Event::fake();
        $data = [];

        $wishListItem = app(CreateWishListItemTask::class)->run($data);

        $this->assertModelExists($wishListItem);
        Event::assertDispatched(WishListItemCreatedEvent::class);
    }

    // TODO TEST
//    public function testCreateWishListItemWithInvalidData(): void
//    {
//        $this->expectException(CreateResourceFailedException::class);
//
//        $data = [
//            // put some invalid data here
//            // 'invalid' => 'data',
//        ];
//
//        app(CreateWishListItemTask::class)->run($data);
//    }
}
