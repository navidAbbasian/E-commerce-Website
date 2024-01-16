<?php

namespace App\Containers\AppSection\Category\Tests\Unit;

use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Category\Tests\UnitTestCase;

/**
 * Class CategoryFactoryTest.
 *
 * @group category
 * @group unit
 */
class CategoryFactoryTest extends UnitTestCase
{
    public function testCreateCategory(): void
    {
        $category = Category::factory()->make();

        $this->assertInstanceOf(Category::class, $category);
    }
}
