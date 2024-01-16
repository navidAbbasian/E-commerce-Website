<?php

namespace App\Containers\AppSection\Banner\UI\API\Tests\Functional;

use App\Containers\AppSection\Banner\Models\Banner;
use App\Containers\AppSection\Banner\UI\API\Tests\ApiTestCase;
use Hashids;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class FindBannerByIdTest.
 *
 * @group banner
 * @group api
 */
class FindBannerByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/banners/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindBanner(): void
    {
        $banner = Banner::factory()->create();

        $response = $this->injectId($banner->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', Hashids::encode($banner->id))
                    ->etc()
        );
    }

    public function testFindNonExistingBanner(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredBannerResponse(): void
    {
        $banner = Banner::factory()->create();

        $response = $this->injectId($banner->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $banner->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
//    public function testFindBannerWithRelation(): void
//    {
//        $banner = Banner::factory()->create();
//        $relation = 'roles';
//
//        $response = $this->injectId($banner->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//              $json->has('data')
//                  ->where('data.id', $banner->getHashedKey())
//                  ->count("data.$relation.data", 1)
//                  ->where("data.$relation.data.0.name", 'something')
//                  ->etc()
//        );
//    }
}
