<?php

namespace App\Containers\AppSection\Comment\UI\API\Tests\Functional;

use App\Containers\AppSection\Comment\Models\Comment;
use App\Containers\AppSection\Comment\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class GetAllCommentsTest.
 *
 * @group comment
 * @group api
 */
class GetAllCommentsTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/comments';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testGetAllCommentsByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        Comment::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGetAllCommentsByNonAdmin(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        Comment::factory()->count(2)->create();
//
//        $response = $this->makeCall();
//
//        $response->assertStatus(403);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('message')
//                    ->where('message', 'This action is unauthorized.')
//                    ->etc()
//        );
//    }

    // TODO TEST
//    public function testSearchCommentsByFields(): void
//    {
//        Comment::factory()->count(3)->create();
//        // create a model with specific field values
//        $comment = Comment::factory()->create([
//            // 'name' => 'something',
//        ]);
//
//        // search by the above values
//        $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($comment->name))->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('data')
//                    // ->where('data.0.name', $comment->name)
//                    ->etc()
//        );
//    }

    public function testSearchCommentsByHashID(): void
    {
        $comments = Comment::factory()->count(3)->create();
        $secondComment = $comments[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondComment->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondComment->getHashedKey())
                    ->etc()
        );
    }
}
