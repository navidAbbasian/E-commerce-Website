<?php

namespace App\Containers\AppSection\Media\Tests\Unit;

use App\Containers\AppSection\Media\Events\MediaListedEvent;
use App\Containers\AppSection\Media\Models\Media;
use App\Containers\AppSection\Media\Tasks\GetAllMediaTask;
use App\Containers\AppSection\Media\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * Class GetAllMediaTaskTest.
 *
 * @group media
 * @group unit
 */
class GetAllMediaTaskTest extends UnitTestCase
{
    public function testGetAllMedia(): void
    {
        Event::fake();
        Media::factory()->count(3)->create();

        $foundMedia = app(GetAllMediaTask::class)->run();

        $this->assertCount(3, $foundMedia);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundMedia);
        Event::assertDispatched(MediaListedEvent::class);
    }
}
