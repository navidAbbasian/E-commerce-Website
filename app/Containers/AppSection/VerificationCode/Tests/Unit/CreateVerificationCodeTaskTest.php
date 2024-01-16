<?php

namespace App\Containers\AppSection\VerificationCode\Tests\Unit;

use App\Containers\AppSection\VerificationCode\Events\VerificationCodeCreatedEvent;
use App\Containers\AppSection\VerificationCode\Tasks\CreateVerificationCodeTask;
use App\Containers\AppSection\VerificationCode\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * Class CreateVerificationCodeTaskTest.
 *
 * @group verificationcode
 * @group unit
 */
class CreateVerificationCodeTaskTest extends UnitTestCase
{
    public function testCreateVerificationCode(): void
    {
        Event::fake();
        $data = [];

        $verificationCode = app(CreateVerificationCodeTask::class)->run($data);

        $this->assertModelExists($verificationCode);
        Event::assertDispatched(VerificationCodeCreatedEvent::class);
    }

    // TODO TEST
//    public function testCreateVerificationCodeWithInvalidData(): void
//    {
//        $this->expectException(CreateResourceFailedException::class);
//
//        $data = [
//            // put some invalid data here
//            // 'invalid' => 'data',
//        ];
//
//        app(CreateVerificationCodeTask::class)->run($data);
//    }
}
