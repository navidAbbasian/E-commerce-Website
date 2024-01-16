<?php

namespace App\Containers\AppSection\Comment\UI\API\Tests\Functional;

use App\Containers\AppSection\Comment\Models\Comment;
use App\Containers\AppSection\Comment\UI\API\Tests\ApiTestCase;

/**
 * Class DeleteCommentTest.
 *
 * @group comment
 * @group api
 */
class DeleteCommentTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/comments/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingComment(): void
    {
        $comment = Comment::factory()->create();

        $response = $this->injectId($comment->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingComment(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGivenHaveNoAccess_CannotDeleteComment(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        $comment = Comment::factory()->create();
//
//        $response = $this->injectId($comment->id)->makeCall();
//
//        $response->assertStatus(403);
//    }
}
