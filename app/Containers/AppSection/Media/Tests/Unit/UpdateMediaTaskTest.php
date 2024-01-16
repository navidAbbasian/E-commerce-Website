<?php

namespace App\Containers\AppSection\Media\Tests\Unit;

use App\Containers\AppSection\Media\Events\MediaUpdatedEvent;
use App\Containers\AppSection\Media\Models\Media;
use App\Containers\AppSection\Media\Tasks\UpdateMediaTask;
use App\Containers\AppSection\Media\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class UpdateMediaTaskTest.
 *
 * @group media
 * @group unit
 */
class UpdateMediaTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateMedia(): void
    {
        Event::fake();
        $media = Media::factory()->create();
        $data = [
            // add some fillable fields here
            // 'some_field' => 'new_field_data',
        ];

        $updatedMedia = app(UpdateMediaTask::class)->run($data, $media->id);

        $this->assertEquals($media->id, $updatedMedia->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedMedia->some_field);
        Event::assertDispatched(MediaUpdatedEvent::class);
    }

    public function testUpdateMediaWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdateMediaTask::class)->run([], $noneExistingId);
    }
}
