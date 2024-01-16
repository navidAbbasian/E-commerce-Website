<?php

namespace App\Containers\AppSection\Category\Tests\Unit;

use App\Containers\AppSection\Category\Tests\UnitTestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class CategoriesMigrationTest.
 *
 * @group category
 * @group unit
 */
class CategoriesMigrationTest extends UnitTestCase
{
    public function test_categories_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            // add your migration columns
            'created_at',
            'updated_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('categories', $column));
        }
    }
}
