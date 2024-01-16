<?php

namespace App\Containers\AppSection\Header\Tests\Unit;

use App\Containers\AppSection\Header\Events\HeaderFoundByIdEvent;
use App\Containers\AppSection\Header\Models\Header;
use App\Containers\AppSection\Header\Tasks\FindHeaderByIdTask;
use App\Containers\AppSection\Header\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class FindHeaderByIdTaskTest.
 *
 * @group header
 * @group unit
 */
class FindHeaderByIdTaskTest extends UnitTestCase
{
    public function testFindHeaderById(): void
    {
        Event::fake();
        $header = Header::factory()->create();

        $foundHeader = app(FindHeaderByIdTask::class)->run($header->id);

        $this->assertEquals($header->id, $foundHeader->id);
        Event::assertDispatched(HeaderFoundByIdEvent::class);
    }

    public function testFindHeaderWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindHeaderByIdTask::class)->run($noneExistingId);
    }
}
