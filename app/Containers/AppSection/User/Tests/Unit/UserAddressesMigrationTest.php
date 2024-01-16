<?php

namespace App\Containers\AppSection\User\Tests\Unit;

use App\Containers\AppSection\User\Tests\UnitTestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class UserAddressesMigrationTest.
 *
 * @group useraddress
 * @group unit
 */
class UserAddressesMigrationTest extends UnitTestCase
{
    public function test_user_addresses_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            // add your migration columns
            'created_at',
            'updated_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('user_addresses', $column));
        }
    }
}
