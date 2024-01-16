<?php

namespace App\Containers\AppSection\Media\UI\API\Tests\Functional;

use App\Containers\AppSection\Media\Models\Media;
use App\Containers\AppSection\Media\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class GetAllMediaTest.
 *
 * @group media
 * @group api
 */
class GetAllMediaTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/media';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testGetAllMediaByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        Media::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGetAllMediaByNonAdmin(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        Media::factory()->count(2)->create();
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
//    public function testSearchMediaByFields(): void
//    {
//        Media::factory()->count(3)->create();
//        // create a model with specific field values
//        $media = Media::factory()->create([
//            // 'name' => 'something',
//        ]);
//
//        // search by the above values
//        $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($media->name))->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('data')
//                    // ->where('data.0.name', $media->name)
//                    ->etc()
//        );
//    }

    public function testSearchMediaByHashID(): void
    {
        $media = Media::factory()->count(3)->create();
        $secondMedia = $media[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondMedia->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondMedia->getHashedKey())
                    ->etc()
        );
    }
}
