<?php

namespace App\Containers\AppSection\ShoppingList\Tests\Unit;

use App\Containers\AppSection\ShoppingList\Events\ShoppingListFoundByIdEvent;
use App\Containers\AppSection\ShoppingList\Models\ShoppingList;
use App\Containers\AppSection\ShoppingList\Tasks\FindShoppingListByIdTask;
use App\Containers\AppSection\ShoppingList\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class FindShoppingListByIdTaskTest.
 *
 * @group shoppinglist
 * @group unit
 */
class FindShoppingListByIdTaskTest extends UnitTestCase
{
    public function testFindShoppingListById(): void
    {
        Event::fake();
        $shoppingList = ShoppingList::factory()->create();

        $foundShoppingList = app(FindShoppingListByIdTask::class)->run($shoppingList->id);

        $this->assertEquals($shoppingList->id, $foundShoppingList->id);
        Event::assertDispatched(ShoppingListFoundByIdEvent::class);
    }

    public function testFindShoppingListWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindShoppingListByIdTask::class)->run($noneExistingId);
    }
}
