<?php

namespace App\Containers\AppSection\VerificationCode\Tests\Unit;

use App\Containers\AppSection\VerificationCode\Events\VerificationCodesListedEvent;
use App\Containers\AppSection\VerificationCode\Models\VerificationCode;
use App\Containers\AppSection\VerificationCode\Tasks\GetAllVerificationCodesTask;
use App\Containers\AppSection\VerificationCode\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * Class GetAllVerificationCodesTaskTest.
 *
 * @group verificationcode
 * @group unit
 */
class GetAllVerificationCodesTaskTest extends UnitTestCase
{
    public function testGetAllVerificationCodes(): void
    {
        Event::fake();
        VerificationCode::factory()->count(3)->create();

        $foundVerificationCodes = app(GetAllVerificationCodesTask::class)->run();

        $this->assertCount(3, $foundVerificationCodes);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundVerificationCodes);
        Event::assertDispatched(VerificationCodesListedEvent::class);
    }
}
