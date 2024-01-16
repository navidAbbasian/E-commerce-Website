<?php

namespace App\Containers\AppSection\Comment\Tests\Unit;

use App\Containers\AppSection\Comment\Events\CommentCreatedEvent;
use App\Containers\AppSection\Comment\Tasks\CreateCommentTask;
use App\Containers\AppSection\Comment\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * Class CreateCommentTaskTest.
 *
 * @group comment
 * @group unit
 */
class CreateCommentTaskTest extends UnitTestCase
{
    public function testCreateComment(): void
    {
        Event::fake();
        $data = [];

        $comment = app(CreateCommentTask::class)->run($data);

        $this->assertModelExists($comment);
        Event::assertDispatched(CommentCreatedEvent::class);
    }

    // TODO TEST
//    public function testCreateCommentWithInvalidData(): void
//    {
//        $this->expectException(CreateResourceFailedException::class);
//
//        $data = [
//            // put some invalid data here
//            // 'invalid' => 'data',
//        ];
//
//        app(CreateCommentTask::class)->run($data);
//    }
}
