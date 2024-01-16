<?php

namespace App\Containers\AppSection\Category\Tests\Unit;

use App\Containers\AppSection\Category\Events\CategoryUpdatedEvent;
use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Category\Tasks\UpdateCategoryTask;
use App\Containers\AppSection\Category\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class UpdateCategoryTaskTest.
 *
 * @group category
 * @group unit
 */
class UpdateCategoryTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateCategory(): void
    {
        Event::fake();
        $category = Category::factory()->create();
        $data = [
            // add some fillable fields here
            // 'some_field' => 'new_field_data',
        ];

        $updatedCategory = app(UpdateCategoryTask::class)->run($data, $category->id);

        $this->assertEquals($category->id, $updatedCategory->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedCategory->some_field);
        Event::assertDispatched(CategoryUpdatedEvent::class);
    }

    public function testUpdateCategoryWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdateCategoryTask::class)->run([], $noneExistingId);
    }
}
