<?php

namespace App\Containers\AppSection\Media\UI\API\Tests\Functional;

use App\Containers\AppSection\Media\Models\Media;
use App\Containers\AppSection\Media\UI\API\Tests\ApiTestCase;

/**
 * Class DeleteMediaTest.
 *
 * @group media
 * @group api
 */
class DeleteMediaTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/media/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingMedia(): void
    {
        $media = Media::factory()->create();

        $response = $this->injectId($media->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingMedia(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGivenHaveNoAccess_CannotDeleteMedia(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        $media = Media::factory()->create();
//
//        $response = $this->injectId($media->id)->makeCall();
//
//        $response->assertStatus(403);
//    }
}
