<?php

namespace App\Containers\AppSection\VerificationCode\Tests\Unit;

use App\Containers\AppSection\VerificationCode\Models\VerificationCode;
use App\Containers\AppSection\VerificationCode\Tests\UnitTestCase;

/**
 * Class VerificationCodeFactoryTest.
 *
 * @group verificationcode
 * @group unit
 */
class VerificationCodeFactoryTest extends UnitTestCase
{
    public function testCreateVerificationCode(): void
    {
        $verificationCode = VerificationCode::factory()->make();

        $this->assertInstanceOf(VerificationCode::class, $verificationCode);
    }
}
