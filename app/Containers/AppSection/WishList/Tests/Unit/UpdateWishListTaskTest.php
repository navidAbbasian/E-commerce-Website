<?php

namespace App\Containers\AppSection\WishList\Tests\Unit;

use App\Containers\AppSection\WishList\Events\WishListUpdatedEvent;
use App\Containers\AppSection\WishList\Models\WishList;
use App\Containers\AppSection\WishList\Tasks\UpdateWishListTask;
use App\Containers\AppSection\WishList\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class UpdateWishListTaskTest.
 *
 * @group wishlist
 * @group unit
 */
class UpdateWishListTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateWishList(): void
    {
        Event::fake();
        $wishList = WishList::factory()->create();
        $data = [
            // add some fillable fields here
            // 'some_field' => 'new_field_data',
        ];

        $updatedWishList = app(UpdateWishListTask::class)->run($data, $wishList->id);

        $this->assertEquals($wishList->id, $updatedWishList->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedWishList->some_field);
        Event::assertDispatched(WishListUpdatedEvent::class);
    }

    public function testUpdateWishListWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdateWishListTask::class)->run([], $noneExistingId);
    }
}
