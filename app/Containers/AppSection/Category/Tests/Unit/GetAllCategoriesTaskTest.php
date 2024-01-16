<?php

namespace App\Containers\AppSection\Category\Tests\Unit;

use App\Containers\AppSection\Category\Events\CategoriesListedEvent;
use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Category\Tasks\GetAllCategoriesTask;
use App\Containers\AppSection\Category\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * Class GetAllCategoriesTaskTest.
 *
 * @group category
 * @group unit
 */
class GetAllCategoriesTaskTest extends UnitTestCase
{
    public function testGetAllCategories(): void
    {
        Event::fake();
        Category::factory()->count(3)->create();

        $foundCategories = app(GetAllCategoriesTask::class)->run();

        $this->assertCount(3, $foundCategories);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundCategories);
        Event::assertDispatched(CategoriesListedEvent::class);
    }
}
