<?php

namespace App\Containers\AppSection\Tag\UI\API\Tests\Functional;

use App\Containers\AppSection\Tag\Models\Tag;
use App\Containers\AppSection\Tag\UI\API\Tests\ApiTestCase;
use Hashids;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class FindTagByIdTest.
 *
 * @group tag
 * @group api
 */
class FindTagByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/tags/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindTag(): void
    {
        $tag = Tag::factory()->create();

        $response = $this->injectId($tag->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', Hashids::encode($tag->id))
                    ->etc()
        );
    }

    public function testFindNonExistingTag(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredTagResponse(): void
    {
        $tag = Tag::factory()->create();

        $response = $this->injectId($tag->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $tag->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
//    public function testFindTagWithRelation(): void
//    {
//        $tag = Tag::factory()->create();
//        $relation = 'roles';
//
//        $response = $this->injectId($tag->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//              $json->has('data')
//                  ->where('data.id', $tag->getHashedKey())
//                  ->count("data.$relation.data", 1)
//                  ->where("data.$relation.data.0.name", 'something')
//                  ->etc()
//        );
//    }
}
