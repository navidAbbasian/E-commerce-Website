<?php

namespace App\Containers\AppSection\Tag\UI\API\Tests\Functional;

use App\Containers\AppSection\Tag\Models\Tag;
use App\Containers\AppSection\Tag\UI\API\Tests\ApiTestCase;

/**
 * Class DeleteTagTest.
 *
 * @group tag
 * @group api
 */
class DeleteTagTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/tags/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingTag(): void
    {
        $tag = Tag::factory()->create();

        $response = $this->injectId($tag->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingTag(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGivenHaveNoAccess_CannotDeleteTag(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        $tag = Tag::factory()->create();
//
//        $response = $this->injectId($tag->id)->makeCall();
//
//        $response->assertStatus(403);
//    }
}
