<?php

namespace App\Containers\AppSection\Carousel\Tests\Unit;

use App\Containers\AppSection\Carousel\Tests\UnitTestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class CarouselsMigrationTest.
 *
 * @group carousel
 * @group unit
 */
class CarouselsMigrationTest extends UnitTestCase
{
    public function test_carousels_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            // add your migration columns
            'created_at',
            'updated_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('carousels', $column));
        }
    }
}
