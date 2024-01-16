<?php

namespace App\Containers\AppSection\Province\Tests\Unit;

use App\Containers\AppSection\Province\Tests\UnitTestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class CitiesMigrationTest.
 *
 * @group city
 * @group unit
 */
class CitiesMigrationTest extends UnitTestCase
{
    public function test_cities_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            // add your migration columns
            'created_at',
            'updated_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('cities', $column));
        }
    }
}
