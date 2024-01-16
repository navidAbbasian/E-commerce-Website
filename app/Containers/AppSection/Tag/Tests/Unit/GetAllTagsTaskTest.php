<?php

namespace App\Containers\AppSection\Tag\Tests\Unit;

use App\Containers\AppSection\Tag\Events\TagsListedEvent;
use App\Containers\AppSection\Tag\Models\Tag;
use App\Containers\AppSection\Tag\Tasks\GetAllTagsTask;
use App\Containers\AppSection\Tag\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * Class GetAllTagsTaskTest.
 *
 * @group tag
 * @group unit
 */
class GetAllTagsTaskTest extends UnitTestCase
{
    public function testGetAllTags(): void
    {
        Event::fake();
        Tag::factory()->count(3)->create();

        $foundTags = app(GetAllTagsTask::class)->run();

        $this->assertCount(3, $foundTags);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundTags);
        Event::assertDispatched(TagsListedEvent::class);
    }
}
