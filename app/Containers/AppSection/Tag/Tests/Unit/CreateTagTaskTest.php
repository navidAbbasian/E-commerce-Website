<?php

namespace App\Containers\AppSection\Tag\Tests\Unit;

use App\Containers\AppSection\Tag\Events\TagCreatedEvent;
use App\Containers\AppSection\Tag\Tasks\CreateTagTask;
use App\Containers\AppSection\Tag\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * Class CreateTagTaskTest.
 *
 * @group tag
 * @group unit
 */
class CreateTagTaskTest extends UnitTestCase
{
    public function testCreateTag(): void
    {
        Event::fake();
        $data = [];

        $tag = app(CreateTagTask::class)->run($data);

        $this->assertModelExists($tag);
        Event::assertDispatched(TagCreatedEvent::class);
    }

    // TODO TEST
//    public function testCreateTagWithInvalidData(): void
//    {
//        $this->expectException(CreateResourceFailedException::class);
//
//        $data = [
//            // put some invalid data here
//            // 'invalid' => 'data',
//        ];
//
//        app(CreateTagTask::class)->run($data);
//    }
}
