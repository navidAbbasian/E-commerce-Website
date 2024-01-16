<?php

namespace App\Containers\AppSection\WishList\Tests\Unit;

use App\Containers\AppSection\WishList\Events\WishListCreatedEvent;
use App\Containers\AppSection\WishList\Tasks\CreateWishListTask;
use App\Containers\AppSection\WishList\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * Class CreateWishListTaskTest.
 *
 * @group wishlist
 * @group unit
 */
class CreateWishListTaskTest extends UnitTestCase
{
    public function testCreateWishList(): void
    {
        Event::fake();
        $data = [];

        $wishList = app(CreateWishListTask::class)->run($data);

        $this->assertModelExists($wishList);
        Event::assertDispatched(WishListCreatedEvent::class);
    }

    // TODO TEST
//    public function testCreateWishListWithInvalidData(): void
//    {
//        $this->expectException(CreateResourceFailedException::class);
//
//        $data = [
//            // put some invalid data here
//            // 'invalid' => 'data',
//        ];
//
//        app(CreateWishListTask::class)->run($data);
//    }
}
