<?php

namespace App\Containers\AppSection\Cart\Tests\Unit;

use App\Containers\AppSection\Cart\Tests\UnitTestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class CartsMigrationTest.
 *
 * @group cart
 * @group unit
 */
class CartsMigrationTest extends UnitTestCase
{
    public function test_carts_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            // add your migration columns
            'created_at',
            'updated_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('carts', $column));
        }
    }
}
