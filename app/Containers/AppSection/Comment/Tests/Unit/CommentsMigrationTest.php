<?php

namespace App\Containers\AppSection\Comment\Tests\Unit;

use App\Containers\AppSection\Comment\Tests\UnitTestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class CommentsMigrationTest.
 *
 * @group comment
 * @group unit
 */
class CommentsMigrationTest extends UnitTestCase
{
    public function test_comments_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            // add your migration columns
            'created_at',
            'updated_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('comments', $column));
        }
    }
}
