<?php

namespace App\Containers\AppSection\Header\Tests\Unit;

use App\Containers\AppSection\Header\Events\HeaderDeletedEvent;
use App\Containers\AppSection\Header\Models\Header;
use App\Containers\AppSection\Header\Tasks\DeleteHeaderTask;
use App\Containers\AppSection\Header\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class DeleteHeaderTaskTest.
 *
 * @group header
 * @group unit
 */
class DeleteHeaderTaskTest extends UnitTestCase
{
    public function testDeleteHeader(): void
    {
        Event::fake();
        $header = Header::factory()->create();

        $result = app(DeleteHeaderTask::class)->run($header->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(HeaderDeletedEvent::class);
    }

    public function testDeleteHeaderWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeleteHeaderTask::class)->run($noneExistingId);
    }
}
