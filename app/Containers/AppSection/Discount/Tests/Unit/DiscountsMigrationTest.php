<?php

namespace App\Containers\AppSection\Discount\Tests\Unit;

use App\Containers\AppSection\Discount\Tests\UnitTestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class DiscountsMigrationTest.
 *
 * @group discount
 * @group unit
 */
class DiscountsMigrationTest extends UnitTestCase
{
    public function test_discounts_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            // add your migration columns
            'created_at',
            'updated_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('discounts', $column));
        }
    }
}
