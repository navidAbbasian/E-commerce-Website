<?php

namespace App\Containers\AppSection\Category\Tests\Unit;

use App\Containers\AppSection\Category\Events\CategoryCreatedEvent;
use App\Containers\AppSection\Category\Tasks\CreateCategoryTask;
use App\Containers\AppSection\Category\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * Class CreateCategoryTaskTest.
 *
 * @group category
 * @group unit
 */
class CreateCategoryTaskTest extends UnitTestCase
{
    public function testCreateCategory(): void
    {
        Event::fake();
        $data = [];

        $category = app(CreateCategoryTask::class)->run($data);

        $this->assertModelExists($category);
        Event::assertDispatched(CategoryCreatedEvent::class);
    }

    // TODO TEST
//    public function testCreateCategoryWithInvalidData(): void
//    {
//        $this->expectException(CreateResourceFailedException::class);
//
//        $data = [
//            // put some invalid data here
//            // 'invalid' => 'data',
//        ];
//
//        app(CreateCategoryTask::class)->run($data);
//    }
}
