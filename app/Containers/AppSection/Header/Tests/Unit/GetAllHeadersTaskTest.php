<?php

namespace App\Containers\AppSection\Header\Tests\Unit;

use App\Containers\AppSection\Header\Events\HeadersListedEvent;
use App\Containers\AppSection\Header\Models\Header;
use App\Containers\AppSection\Header\Tasks\GetAllHeadersTask;
use App\Containers\AppSection\Header\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * Class GetAllHeadersTaskTest.
 *
 * @group header
 * @group unit
 */
class GetAllHeadersTaskTest extends UnitTestCase
{
    public function testGetAllHeaders(): void
    {
        Event::fake();
        Header::factory()->count(3)->create();

        $foundHeaders = app(GetAllHeadersTask::class)->run();

        $this->assertCount(3, $foundHeaders);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundHeaders);
        Event::assertDispatched(HeadersListedEvent::class);
    }
}
