<?php

namespace App\Containers\AppSection\Category\Tests\Unit;

use App\Containers\AppSection\Category\Events\CategoryFoundByIdEvent;
use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Category\Tasks\FindCategoryByIdTask;
use App\Containers\AppSection\Category\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class FindCategoryByIdTaskTest.
 *
 * @group category
 * @group unit
 */
class FindCategoryByIdTaskTest extends UnitTestCase
{
    public function testFindCategoryById(): void
    {
        Event::fake();
        $category = Category::factory()->create();

        $foundCategory = app(FindCategoryByIdTask::class)->run($category->id);

        $this->assertEquals($category->id, $foundCategory->id);
        Event::assertDispatched(CategoryFoundByIdEvent::class);
    }

    public function testFindCategoryWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindCategoryByIdTask::class)->run($noneExistingId);
    }
}
