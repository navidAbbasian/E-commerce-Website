<?php

namespace App\Containers\AppSection\ShoppingList\Tests\Unit;

use App\Containers\AppSection\ShoppingList\Events\ShoppingListDeletedEvent;
use App\Containers\AppSection\ShoppingList\Models\ShoppingList;
use App\Containers\AppSection\ShoppingList\Tasks\DeleteShoppingListTask;
use App\Containers\AppSection\ShoppingList\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class DeleteShoppingListTaskTest.
 *
 * @group shoppinglist
 * @group unit
 */
class DeleteShoppingListTaskTest extends UnitTestCase
{
    public function testDeleteShoppingList(): void
    {
        Event::fake();
        $shoppingList = ShoppingList::factory()->create();

        $result = app(DeleteShoppingListTask::class)->run($shoppingList->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(ShoppingListDeletedEvent::class);
    }

    public function testDeleteShoppingListWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeleteShoppingListTask::class)->run($noneExistingId);
    }
}
