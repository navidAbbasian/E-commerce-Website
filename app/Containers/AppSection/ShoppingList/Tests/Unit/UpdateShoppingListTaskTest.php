<?php

namespace App\Containers\AppSection\ShoppingList\Tests\Unit;

use App\Containers\AppSection\ShoppingList\Events\ShoppingListUpdatedEvent;
use App\Containers\AppSection\ShoppingList\Models\ShoppingList;
use App\Containers\AppSection\ShoppingList\Tasks\UpdateShoppingListTask;
use App\Containers\AppSection\ShoppingList\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class UpdateShoppingListTaskTest.
 *
 * @group shoppinglist
 * @group unit
 */
class UpdateShoppingListTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateShoppingList(): void
    {
        Event::fake();
        $shoppingList = ShoppingList::factory()->create();
        $data = [
            // add some fillable fields here
            // 'some_field' => 'new_field_data',
        ];

        $updatedShoppingList = app(UpdateShoppingListTask::class)->run($data, $shoppingList->id);

        $this->assertEquals($shoppingList->id, $updatedShoppingList->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedShoppingList->some_field);
        Event::assertDispatched(ShoppingListUpdatedEvent::class);
    }

    public function testUpdateShoppingListWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdateShoppingListTask::class)->run([], $noneExistingId);
    }
}
