<?php

namespace App\Containers\AppSection\Comment\Tests\Unit;

use App\Containers\AppSection\Comment\Events\CommentsListedEvent;
use App\Containers\AppSection\Comment\Models\Comment;
use App\Containers\AppSection\Comment\Tasks\GetAllCommentsTask;
use App\Containers\AppSection\Comment\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * Class GetAllCommentsTaskTest.
 *
 * @group comment
 * @group unit
 */
class GetAllCommentsTaskTest extends UnitTestCase
{
    public function testGetAllComments(): void
    {
        Event::fake();
        Comment::factory()->count(3)->create();

        $foundComments = app(GetAllCommentsTask::class)->run();

        $this->assertCount(3, $foundComments);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundComments);
        Event::assertDispatched(CommentsListedEvent::class);
    }
}
