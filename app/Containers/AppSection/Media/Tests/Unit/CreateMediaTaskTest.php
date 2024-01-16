<?php

namespace App\Containers\AppSection\Media\Tests\Unit;

use App\Containers\AppSection\Media\Events\MediaCreatedEvent;
use App\Containers\AppSection\Media\Tasks\CreateMediaTask;
use App\Containers\AppSection\Media\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * Class CreateMediaTaskTest.
 *
 * @group media
 * @group unit
 */
class CreateMediaTaskTest extends UnitTestCase
{
    public function testCreateMedia(): void
    {
        Event::fake();
        $data = [];

        $media = app(CreateMediaTask::class)->run($data);

        $this->assertModelExists($media);
        Event::assertDispatched(MediaCreatedEvent::class);
    }

    // TODO TEST
//    public function testCreateMediaWithInvalidData(): void
//    {
//        $this->expectException(CreateResourceFailedException::class);
//
//        $data = [
//            // put some invalid data here
//            // 'invalid' => 'data',
//        ];
//
//        app(CreateMediaTask::class)->run($data);
//    }
}
