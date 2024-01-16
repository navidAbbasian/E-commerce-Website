<?php

namespace App\Containers\AppSection\Media\Tests\Unit;

use App\Containers\AppSection\Media\Events\MediaFoundByIdEvent;
use App\Containers\AppSection\Media\Models\Media;
use App\Containers\AppSection\Media\Tasks\FindMediaByIdTask;
use App\Containers\AppSection\Media\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class FindMediaByIdTaskTest.
 *
 * @group media
 * @group unit
 */
class FindMediaByIdTaskTest extends UnitTestCase
{
    public function testFindMediaById(): void
    {
        Event::fake();
        $media = Media::factory()->create();

        $foundMedia = app(FindMediaByIdTask::class)->run($media->id);

        $this->assertEquals($media->id, $foundMedia->id);
        Event::assertDispatched(MediaFoundByIdEvent::class);
    }

    public function testFindMediaWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindMediaByIdTask::class)->run($noneExistingId);
    }
}
