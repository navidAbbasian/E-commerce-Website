<?php

namespace App\Containers\AppSection\Tag\Tests\Unit;

use App\Containers\AppSection\Tag\Events\TagUpdatedEvent;
use App\Containers\AppSection\Tag\Models\Tag;
use App\Containers\AppSection\Tag\Tasks\UpdateTagTask;
use App\Containers\AppSection\Tag\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class UpdateTagTaskTest.
 *
 * @group tag
 * @group unit
 */
class UpdateTagTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateTag(): void
    {
        Event::fake();
        $tag = Tag::factory()->create();
        $data = [
            // add some fillable fields here
            // 'some_field' => 'new_field_data',
        ];

        $updatedTag = app(UpdateTagTask::class)->run($data, $tag->id);

        $this->assertEquals($tag->id, $updatedTag->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedTag->some_field);
        Event::assertDispatched(TagUpdatedEvent::class);
    }

    public function testUpdateTagWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdateTagTask::class)->run([], $noneExistingId);
    }
}
