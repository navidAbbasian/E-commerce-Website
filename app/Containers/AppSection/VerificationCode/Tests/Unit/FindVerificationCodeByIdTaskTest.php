<?php

namespace App\Containers\AppSection\VerificationCode\Tests\Unit;

use App\Containers\AppSection\VerificationCode\Events\VerificationCodeFoundByIdEvent;
use App\Containers\AppSection\VerificationCode\Models\VerificationCode;
use App\Containers\AppSection\VerificationCode\Tasks\FindVerificationCodeByIdTask;
use App\Containers\AppSection\VerificationCode\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class FindVerificationCodeByIdTaskTest.
 *
 * @group verificationcode
 * @group unit
 */
class FindVerificationCodeByIdTaskTest extends UnitTestCase
{
    public function testFindVerificationCodeById(): void
    {
        Event::fake();
        $verificationCode = VerificationCode::factory()->create();

        $foundVerificationCode = app(FindVerificationCodeByIdTask::class)->run($verificationCode->id);

        $this->assertEquals($verificationCode->id, $foundVerificationCode->id);
        Event::assertDispatched(VerificationCodeFoundByIdEvent::class);
    }

    public function testFindVerificationCodeWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindVerificationCodeByIdTask::class)->run($noneExistingId);
    }
}
