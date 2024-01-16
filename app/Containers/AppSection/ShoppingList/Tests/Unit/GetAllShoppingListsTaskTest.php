<?php

namespace App\Containers\AppSection\ShoppingList\Tests\Unit;

use App\Containers\AppSection\ShoppingList\Events\ShoppingListsListedEvent;
use App\Containers\AppSection\ShoppingList\Models\ShoppingList;
use App\Containers\AppSection\ShoppingList\Tasks\GetAllShoppingListsTask;
use App\Containers\AppSection\ShoppingList\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * Class GetAllShoppingListsTaskTest.
 *
 * @group shoppinglist
 * @group unit
 */
class GetAllShoppingListsTaskTest extends UnitTestCase
{
    public function testGetAllShoppingLists(): void
    {
        Event::fake();
        ShoppingList::factory()->count(3)->create();

        $foundShoppingLists = app(GetAllShoppingListsTask::class)->run();

        $this->assertCount(3, $foundShoppingLists);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundShoppingLists);
        Event::assertDispatched(ShoppingListsListedEvent::class);
    }
}
