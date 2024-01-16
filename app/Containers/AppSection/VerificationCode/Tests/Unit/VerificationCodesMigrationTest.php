<?php

namespace App\Containers\AppSection\VerificationCode\Tests\Unit;

use App\Containers\AppSection\VerificationCode\Tests\UnitTestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class VerificationCodesMigrationTest.
 *
 * @group verificationcode
 * @group unit
 */
class VerificationCodesMigrationTest extends UnitTestCase
{
    public function test_verification_codes_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            // add your migration columns
            'created_at',
            'updated_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('verification_codes', $column));
        }
    }
}
