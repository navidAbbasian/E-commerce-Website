<?php

namespace App\Containers\AppSection\WishList\Tests\Unit;

use App\Containers\AppSection\WishList\Tests\UnitTestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class WishListItemsMigrationTest.
 *
 * @group wishlistitem
 * @group unit
 */
class WishListItemsMigrationTest extends UnitTestCase
{
    public function test_wish_list_items_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            // add your migration columns
            'created_at',
            'updated_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('wish_list_items', $column));
        }
    }
}
