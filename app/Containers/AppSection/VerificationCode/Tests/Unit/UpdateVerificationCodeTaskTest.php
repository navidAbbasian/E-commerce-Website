<?php

namespace App\Containers\AppSection\VerificationCode\Tests\Unit;

use App\Containers\AppSection\VerificationCode\Events\VerificationCodeUpdatedEvent;
use App\Containers\AppSection\VerificationCode\Models\VerificationCode;
use App\Containers\AppSection\VerificationCode\Tasks\UpdateVerificationCodeTask;
use App\Containers\AppSection\VerificationCode\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class UpdateVerificationCodeTaskTest.
 *
 * @group verificationcode
 * @group unit
 */
class UpdateVerificationCodeTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateVerificationCode(): void
    {
        Event::fake();
        $verificationCode = VerificationCode::factory()->create();
        $data = [
            // add some fillable fields here
            // 'some_field' => 'new_field_data',
        ];

        $updatedVerificationCode = app(UpdateVerificationCodeTask::class)->run($data, $verificationCode->id);

        $this->assertEquals($verificationCode->id, $updatedVerificationCode->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedVerificationCode->some_field);
        Event::assertDispatched(VerificationCodeUpdatedEvent::class);
    }

    public function testUpdateVerificationCodeWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdateVerificationCodeTask::class)->run([], $noneExistingId);
    }
}
