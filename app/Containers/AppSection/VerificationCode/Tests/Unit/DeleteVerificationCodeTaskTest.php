<?php

namespace App\Containers\AppSection\VerificationCode\Tests\Unit;

use App\Containers\AppSection\VerificationCode\Events\VerificationCodeDeletedEvent;
use App\Containers\AppSection\VerificationCode\Models\VerificationCode;
use App\Containers\AppSection\VerificationCode\Tasks\DeleteVerificationCodeTask;
use App\Containers\AppSection\VerificationCode\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class DeleteVerificationCodeTaskTest.
 *
 * @group verificationcode
 * @group unit
 */
class DeleteVerificationCodeTaskTest extends UnitTestCase
{
    public function testDeleteVerificationCode(): void
    {
        Event::fake();
        $verificationCode = VerificationCode::factory()->create();

        $result = app(DeleteVerificationCodeTask::class)->run($verificationCode->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(VerificationCodeDeletedEvent::class);
    }

    public function testDeleteVerificationCodeWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeleteVerificationCodeTask::class)->run($noneExistingId);
    }
}
