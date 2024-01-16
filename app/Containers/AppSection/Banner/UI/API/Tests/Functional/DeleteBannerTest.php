<?php

namespace App\Containers\AppSection\Banner\UI\API\Tests\Functional;

use App\Containers\AppSection\Banner\Models\Banner;
use App\Containers\AppSection\Banner\UI\API\Tests\ApiTestCase;

/**
 * Class DeleteBannerTest.
 *
 * @group banner
 * @group api
 */
class DeleteBannerTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/banners/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingBanner(): void
    {
        $banner = Banner::factory()->create();

        $response = $this->injectId($banner->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingBanner(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGivenHaveNoAccess_CannotDeleteBanner(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        $banner = Banner::factory()->create();
//
//        $response = $this->injectId($banner->id)->makeCall();
//
//        $response->assertStatus(403);
//    }
}
