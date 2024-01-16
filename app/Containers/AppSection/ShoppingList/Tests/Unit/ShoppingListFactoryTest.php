<?php

namespace App\Containers\AppSection\ShoppingList\Tests\Unit;

use App\Containers\AppSection\ShoppingList\Models\ShoppingList;
use App\Containers\AppSection\ShoppingList\Tests\UnitTestCase;

/**
 * Class ShoppingListFactoryTest.
 *
 * @group shoppinglist
 * @group unit
 */
class ShoppingListFactoryTest extends UnitTestCase
{
    public function testCreateShoppingList(): void
    {
        $shoppingList = ShoppingList::factory()->make();

        $this->assertInstanceOf(ShoppingList::class, $shoppingList);
    }
}
