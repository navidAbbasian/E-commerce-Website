<?php

namespace App\Containers\AppSection\Tag\Tests\Unit;

use App\Containers\AppSection\Tag\Models\Tag;
use App\Containers\AppSection\Tag\Tests\UnitTestCase;

/**
 * Class TagFactoryTest.
 *
 * @group tag
 * @group unit
 */
class TagFactoryTest extends UnitTestCase
{
    public function testCreateTag(): void
    {
        $tag = Tag::factory()->make();

        $this->assertInstanceOf(Tag::class, $tag);
    }
}
