<?php

namespace App\Containers\AppSection\Header\Tests\Unit;

use App\Containers\AppSection\Header\Tests\UnitTestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class HeadersMigrationTest.
 *
 * @group header
 * @group unit
 */
class HeadersMigrationTest extends UnitTestCase
{
    public function test_headers_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            // add your migration columns
            'created_at',
            'updated_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('headers', $column));
        }
    }
}
