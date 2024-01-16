<?php

namespace App\Containers\AppSection\Comment\Tests\Unit;

use App\Containers\AppSection\Comment\Models\Comment;
use App\Containers\AppSection\Comment\Tests\UnitTestCase;

/**
 * Class CommentFactoryTest.
 *
 * @group comment
 * @group unit
 */
class CommentFactoryTest extends UnitTestCase
{
    public function testCreateComment(): void
    {
        $comment = Comment::factory()->make();

        $this->assertInstanceOf(Comment::class, $comment);
    }
}
