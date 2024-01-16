<?php

namespace App\Containers\AppSection\Tag\Tests\Unit;

use App\Containers\AppSection\Tag\Tests\UnitTestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class TagsMigrationTest.
 *
 * @group tag
 * @group unit
 */
class TagsMigrationTest extends UnitTestCase
{
    public function test_tags_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            // add your migration columns
            'created_at',
            'updated_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('tags', $column));
        }
    }
}
