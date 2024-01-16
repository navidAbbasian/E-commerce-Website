<?php

namespace App\Containers\AppSection\Slider\Tests\Unit;

use App\Containers\AppSection\Slider\Tests\UnitTestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class SlidersMigrationTest.
 *
 * @group slider
 * @group unit
 */
class SlidersMigrationTest extends UnitTestCase
{
    public function test_sliders_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            // add your migration columns
            'created_at',
            'updated_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('sliders', $column));
        }
    }
}
