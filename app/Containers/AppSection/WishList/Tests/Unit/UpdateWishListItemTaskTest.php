<?php

namespace App\Containers\AppSection\WishList\Tests\Unit;

use App\Containers\AppSection\WishList\Events\WishListItemUpdatedEvent;
use App\Containers\AppSection\WishList\Models\WishListItem;
use App\Containers\AppSection\WishList\Tasks\UpdateWishListItemTask;
use App\Containers\AppSection\WishList\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class UpdateWishListItemTaskTest.
 *
 * @group wishlistitem
 * @group unit
 */
class UpdateWishListItemTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateWishListItem(): void
    {
        Event::fake();
        $wishListItem = WishListItem::factory()->create();
        $data = [
            // add some fillable fields here
            // 'some_field' => 'new_field_data',
        ];

        $updatedWishListItem = app(UpdateWishListItemTask::class)->run($data, $wishListItem->id);

        $this->assertEquals($wishListItem->id, $updatedWishListItem->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedWishListItem->some_field);
        Event::assertDispatched(WishListItemUpdatedEvent::class);
    }

    public function testUpdateWishListItemWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdateWishListItemTask::class)->run([], $noneExistingId);
    }
}
