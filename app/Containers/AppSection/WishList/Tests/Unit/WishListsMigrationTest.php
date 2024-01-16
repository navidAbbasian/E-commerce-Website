<?php

namespace App\Containers\AppSection\WishList\Tests\Unit;

use App\Containers\AppSection\WishList\Tests\UnitTestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class WishListsMigrationTest.
 *
 * @group wishlist
 * @group unit
 */
class WishListsMigrationTest extends UnitTestCase
{
    public function test_wish_lists_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            // add your migration columns
            'created_at',
            'updated_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('wish_lists', $column));
        }
    }
}
