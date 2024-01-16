<?php

namespace App\Containers\AppSection\Brand\Tests\Unit;

use App\Containers\AppSection\Brand\Tests\UnitTestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class BrandsMigrationTest.
 *
 * @group brand
 * @group unit
 */
class BrandsMigrationTest extends UnitTestCase
{
    public function test_brands_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            // add your migration columns
            'created_at',
            'updated_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('brands', $column));
        }
    }
}
