<?php

namespace App\Containers\AppSection\ShoppingList\Tests\Unit;

use App\Containers\AppSection\ShoppingList\Events\ShoppingListCreatedEvent;
use App\Containers\AppSection\ShoppingList\Tasks\CreateShoppingListTask;
use App\Containers\AppSection\ShoppingList\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * Class CreateShoppingListTaskTest.
 *
 * @group shoppinglist
 * @group unit
 */
class CreateShoppingListTaskTest extends UnitTestCase
{
    public function testCreateShoppingList(): void
    {
        Event::fake();
        $data = [];

        $shoppingList = app(CreateShoppingListTask::class)->run($data);

        $this->assertModelExists($shoppingList);
        Event::assertDispatched(ShoppingListCreatedEvent::class);
    }

    // TODO TEST
//    public function testCreateShoppingListWithInvalidData(): void
//    {
//        $this->expectException(CreateResourceFailedException::class);
//
//        $data = [
//            // put some invalid data here
//            // 'invalid' => 'data',
//        ];
//
//        app(CreateShoppingListTask::class)->run($data);
//    }
}
