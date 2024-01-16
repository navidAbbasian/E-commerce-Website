<?php

namespace App\Containers\AppSection\Footer\Tests\Unit;

use App\Containers\AppSection\Footer\Tests\UnitTestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class FootersMigrationTest.
 *
 * @group footer
 * @group unit
 */
class FootersMigrationTest extends UnitTestCase
{
    public function test_footers_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            // add your migration columns
            'created_at',
            'updated_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('footers', $column));
        }
    }
}
