<?php

namespace App\Containers\AppSection\Media\Tests\Unit;

use App\Containers\AppSection\Media\Events\MediaDeletedEvent;
use App\Containers\AppSection\Media\Models\Media;
use App\Containers\AppSection\Media\Tasks\DeleteMediaTask;
use App\Containers\AppSection\Media\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class DeleteMediaTaskTest.
 *
 * @group media
 * @group unit
 */
class DeleteMediaTaskTest extends UnitTestCase
{
    public function testDeleteMedia(): void
    {
        Event::fake();
        $media = Media::factory()->create();

        $result = app(DeleteMediaTask::class)->run($media->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(MediaDeletedEvent::class);
    }

    public function testDeleteMediaWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeleteMediaTask::class)->run($noneExistingId);
    }
}
