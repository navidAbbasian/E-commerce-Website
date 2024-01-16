<?php

namespace App\Containers\AppSection\Banner\Tests\Unit;

use App\Containers\AppSection\Banner\Tests\UnitTestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class BannersMigrationTest.
 *
 * @group banner
 * @group unit
 */
class BannersMigrationTest extends UnitTestCase
{
    public function test_banners_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            // add your migration columns
            'created_at',
            'updated_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('banners', $column));
        }
    }
}
