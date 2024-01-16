<?php

namespace App\Containers\AppSection\Shop\Tests\Unit;

use App\Containers\AppSection\Shop\Tests\UnitTestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class ShopsMigrationTest.
 *
 * @group shop
 * @group unit
 */
class ShopsMigrationTest extends UnitTestCase
{
    public function test_shops_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            // add your migration columns
            'created_at',
            'updated_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('shops', $column));
        }
    }
}
