<?php

namespace App\Containers\AppSection\Comment\UI\API\Tests\Functional;

use App\Containers\AppSection\Comment\Models\Comment;
use App\Containers\AppSection\Comment\UI\API\Tests\ApiTestCase;
use Hashids;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class FindCommentByIdTest.
 *
 * @group comment
 * @group api
 */
class FindCommentByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/comments/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindComment(): void
    {
        $comment = Comment::factory()->create();

        $response = $this->injectId($comment->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', Hashids::encode($comment->id))
                    ->etc()
        );
    }

    public function testFindNonExistingComment(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredCommentResponse(): void
    {
        $comment = Comment::factory()->create();

        $response = $this->injectId($comment->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $comment->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
//    public function testFindCommentWithRelation(): void
//    {
//        $comment = Comment::factory()->create();
//        $relation = 'roles';
//
//        $response = $this->injectId($comment->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//              $json->has('data')
//                  ->where('data.id', $comment->getHashedKey())
//                  ->count("data.$relation.data", 1)
//                  ->where("data.$relation.data.0.name", 'something')
//                  ->etc()
//        );
//    }
}
