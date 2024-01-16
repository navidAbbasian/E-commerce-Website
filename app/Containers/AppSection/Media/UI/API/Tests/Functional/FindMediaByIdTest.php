<?php

namespace App\Containers\AppSection\Media\UI\API\Tests\Functional;

use App\Containers\AppSection\Media\Models\Media;
use App\Containers\AppSection\Media\UI\API\Tests\ApiTestCase;
use Hashids;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class FindMediaByIdTest.
 *
 * @group media
 * @group api
 */
class FindMediaByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/media/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindMedia(): void
    {
        $media = Media::factory()->create();

        $response = $this->injectId($media->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', Hashids::encode($media->id))
                    ->etc()
        );
    }

    public function testFindNonExistingMedia(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredMediaResponse(): void
    {
        $media = Media::factory()->create();

        $response = $this->injectId($media->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $media->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
//    public function testFindMediaWithRelation(): void
//    {
//        $media = Media::factory()->create();
//        $relation = 'roles';
//
//        $response = $this->injectId($media->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//              $json->has('data')
//                  ->where('data.id', $media->getHashedKey())
//                  ->count("data.$relation.data", 1)
//                  ->where("data.$relation.data.0.name", 'something')
//                  ->etc()
//        );
//    }
}
