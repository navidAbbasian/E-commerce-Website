<?php

namespace App\Containers\AppSection\Tag\Tests\Unit;

use App\Containers\AppSection\Tag\Events\TagDeletedEvent;
use App\Containers\AppSection\Tag\Models\Tag;
use App\Containers\AppSection\Tag\Tasks\DeleteTagTask;
use App\Containers\AppSection\Tag\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class DeleteTagTaskTest.
 *
 * @group tag
 * @group unit
 */
class DeleteTagTaskTest extends UnitTestCase
{
    public function testDeleteTag(): void
    {
        Event::fake();
        $tag = Tag::factory()->create();

        $result = app(DeleteTagTask::class)->run($tag->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(TagDeletedEvent::class);
    }

    public function testDeleteTagWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeleteTagTask::class)->run($noneExistingId);
    }
}
