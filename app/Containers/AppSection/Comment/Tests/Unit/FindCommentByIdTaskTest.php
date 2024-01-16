<?php

namespace App\Containers\AppSection\Comment\Tests\Unit;

use App\Containers\AppSection\Comment\Events\CommentFoundByIdEvent;
use App\Containers\AppSection\Comment\Models\Comment;
use App\Containers\AppSection\Comment\Tasks\FindCommentByIdTask;
use App\Containers\AppSection\Comment\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class FindCommentByIdTaskTest.
 *
 * @group comment
 * @group unit
 */
class FindCommentByIdTaskTest extends UnitTestCase
{
    public function testFindCommentById(): void
    {
        Event::fake();
        $comment = Comment::factory()->create();

        $foundComment = app(FindCommentByIdTask::class)->run($comment->id);

        $this->assertEquals($comment->id, $foundComment->id);
        Event::assertDispatched(CommentFoundByIdEvent::class);
    }

    public function testFindCommentWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindCommentByIdTask::class)->run($noneExistingId);
    }
}
