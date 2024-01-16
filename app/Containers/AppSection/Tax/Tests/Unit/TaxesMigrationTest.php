<?php

namespace App\Containers\AppSection\Tax\Tests\Unit;

use App\Containers\AppSection\Tax\Tests\UnitTestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class TaxesMigrationTest.
 *
 * @group tax
 * @group unit
 */
class TaxesMigrationTest extends UnitTestCase
{
    public function test_taxes_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            // add your migration columns
            'created_at',
            'updated_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('taxes', $column));
        }
    }
}
