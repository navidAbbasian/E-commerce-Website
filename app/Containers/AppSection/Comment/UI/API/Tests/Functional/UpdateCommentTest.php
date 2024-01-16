<?php

namespace App\Containers\AppSection\Comment\UI\API\Tests\Functional;

use App\Containers\AppSection\Comment\Models\Comment;
use App\Containers\AppSection\Comment\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class UpdateCommentTest.
 *
 * @group comment
 * @group api
 */
class UpdateCommentTest extends ApiTestCase
{
    protected string $endpoint = 'patch@v1/comments/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    // TODO TEST
    public function testUpdateExistingComment(): void
    {
        $comment = Comment::factory()->create([
            // 'some_field' => 'new_field_value',
        ]);
        $data = [
            // 'some_field' => 'new_field_value',
        ];

        $response = $this->injectId($comment->id)->makeCall($data);

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.object', 'Comment')
                    ->where('data.id', $comment->getHashedKey())
                    // ->where('data.some_field', $data['some_field'])
                    ->etc()
        );
    }

    public function testUpdateNonExistingComment(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
//    public function testUpdateExistingCommentWithEmptyValues(): void
//    {
//        $comment = Comment::factory()->create();
//        $data = [
//            // add some fillable fields here
//            // 'first_field' => '',
//            // 'second_field' => '',
//        ];
//
//        $response = $this->injectId($comment->id)->makeCall($data);
//
//        $response->assertStatus(422);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//            $json->has('errors')
//                // ->where('errors.first_field.0', 'assert validation errors')
//                // ->where('errors.second_field.0', 'assert validation errors')
//                ->etc()
//        );
//    }
}
