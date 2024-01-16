<?php

namespace App\Containers\AppSection\Customer\Tests\Unit;

use App\Containers\AppSection\Customer\Tests\UnitTestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class CustomersMigrationTest.
 *
 * @group customer
 * @group unit
 */
class CustomersMigrationTest extends UnitTestCase
{
    public function test_customers_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            // add your migration columns
            'created_at',
            'updated_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('customers', $column));
        }
    }
}
