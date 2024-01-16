<?php

namespace App\Containers\AppSection\Comment\Tests\Unit;

use App\Containers\AppSection\Comment\Events\CommentDeletedEvent;
use App\Containers\AppSection\Comment\Models\Comment;
use App\Containers\AppSection\Comment\Tasks\DeleteCommentTask;
use App\Containers\AppSection\Comment\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class DeleteCommentTaskTest.
 *
 * @group comment
 * @group unit
 */
class DeleteCommentTaskTest extends UnitTestCase
{
    public function testDeleteComment(): void
    {
        Event::fake();
        $comment = Comment::factory()->create();

        $result = app(DeleteCommentTask::class)->run($comment->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(CommentDeletedEvent::class);
    }

    public function testDeleteCommentWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeleteCommentTask::class)->run($noneExistingId);
    }
}
