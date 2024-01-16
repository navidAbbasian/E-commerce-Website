<?php

namespace App\Containers\AppSection\Category\Tests\Unit;

use App\Containers\AppSection\Category\Events\CategoryDeletedEvent;
use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Category\Tasks\DeleteCategoryTask;
use App\Containers\AppSection\Category\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class DeleteCategoryTaskTest.
 *
 * @group category
 * @group unit
 */
class DeleteCategoryTaskTest extends UnitTestCase
{
    public function testDeleteCategory(): void
    {
        Event::fake();
        $category = Category::factory()->create();

        $result = app(DeleteCategoryTask::class)->run($category->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(CategoryDeletedEvent::class);
    }

    public function testDeleteCategoryWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeleteCategoryTask::class)->run($noneExistingId);
    }
}
