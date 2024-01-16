<?php

namespace App\Containers\AppSection\Tag\UI\API\Tests\Functional;

use App\Containers\AppSection\Tag\Models\Tag;
use App\Containers\AppSection\Tag\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class GetAllTagsTest.
 *
 * @group tag
 * @group api
 */
class GetAllTagsTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/tags';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testGetAllTagsByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        Tag::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGetAllTagsByNonAdmin(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        Tag::factory()->count(2)->create();
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
//    public function testSearchTagsByFields(): void
//    {
//        Tag::factory()->count(3)->create();
//        // create a model with specific field values
//        $tag = Tag::factory()->create([
//            // 'name' => 'something',
//        ]);
//
//        // search by the above values
//        $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($tag->name))->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('data')
//                    // ->where('data.0.name', $tag->name)
//                    ->etc()
//        );
//    }

    public function testSearchTagsByHashID(): void
    {
        $tags = Tag::factory()->count(3)->create();
        $secondTag = $tags[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondTag->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondTag->getHashedKey())
                    ->etc()
        );
    }
}
