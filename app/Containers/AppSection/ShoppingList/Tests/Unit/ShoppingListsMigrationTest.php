<?php

namespace App\Containers\AppSection\ShoppingList\Tests\Unit;

use App\Containers\AppSection\ShoppingList\Tests\UnitTestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class ShoppingListsMigrationTest.
 *
 * @group shoppinglist
 * @group unit
 */
class ShoppingListsMigrationTest extends UnitTestCase
{
    public function test_shopping_lists_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            // add your migration columns
            'created_at',
            'updated_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('shopping_lists', $column));
        }
    }
}
