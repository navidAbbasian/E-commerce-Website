<?php

namespace App\Containers\AppSection\Order\Tests\Unit;

use App\Containers\AppSection\Order\Tests\UnitTestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class OrdersMigrationTest.
 *
 * @group order
 * @group unit
 */
class OrdersMigrationTest extends UnitTestCase
{
    public function test_orders_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            // add your migration columns
            'created_at',
            'updated_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('orders', $column));
        }
    }
}
