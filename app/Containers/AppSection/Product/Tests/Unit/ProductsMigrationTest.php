<?php

namespace App\Containers\AppSection\Product\Tests\Unit;

use App\Containers\AppSection\Product\Tests\UnitTestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class ProductsMigrationTest.
 *
 * @group product
 * @group unit
 */
class ProductsMigrationTest extends UnitTestCase
{
    public function test_products_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            // add your migration columns
            'created_at',
            'updated_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('products', $column));
        }
    }
}
