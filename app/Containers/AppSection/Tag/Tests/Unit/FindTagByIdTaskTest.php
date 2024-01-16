<?php

namespace App\Containers\AppSection\Tag\Tests\Unit;

use App\Containers\AppSection\Tag\Events\TagFoundByIdEvent;
use App\Containers\AppSection\Tag\Models\Tag;
use App\Containers\AppSection\Tag\Tasks\FindTagByIdTask;
use App\Containers\AppSection\Tag\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class FindTagByIdTaskTest.
 *
 * @group tag
 * @group unit
 */
class FindTagByIdTaskTest extends UnitTestCase
{
    public function testFindTagById(): void
    {
        Event::fake();
        $tag = Tag::factory()->create();

        $foundTag = app(FindTagByIdTask::class)->run($tag->id);

        $this->assertEquals($tag->id, $foundTag->id);
        Event::assertDispatched(TagFoundByIdEvent::class);
    }

    public function testFindTagWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindTagByIdTask::class)->run($noneExistingId);
    }
}
