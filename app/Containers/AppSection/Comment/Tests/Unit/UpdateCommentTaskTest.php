<?php

namespace App\Containers\AppSection\Comment\Tests\Unit;

use App\Containers\AppSection\Comment\Events\CommentUpdatedEvent;
use App\Containers\AppSection\Comment\Models\Comment;
use App\Containers\AppSection\Comment\Tasks\UpdateCommentTask;
use App\Containers\AppSection\Comment\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class UpdateCommentTaskTest.
 *
 * @group comment
 * @group unit
 */
class UpdateCommentTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateComment(): void
    {
        Event::fake();
        $comment = Comment::factory()->create();
        $data = [
            // add some fillable fields here
            // 'some_field' => 'new_field_data',
        ];

        $updatedComment = app(UpdateCommentTask::class)->run($data, $comment->id);

        $this->assertEquals($comment->id, $updatedComment->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedComment->some_field);
        Event::assertDispatched(CommentUpdatedEvent::class);
    }

    public function testUpdateCommentWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdateCommentTask::class)->run([], $noneExistingId);
    }
}
