<?php

namespace App\Containers\AppSection\Banner\UI\API\Tests\Functional;

use App\Containers\AppSection\Banner\Models\Banner;
use App\Containers\AppSection\Banner\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class GetAllBannersTest.
 *
 * @group banner
 * @group api
 */
class GetAllBannersTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/banners';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testGetAllBannersByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        Banner::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGetAllBannersByNonAdmin(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        Banner::factory()->count(2)->create();
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
//    public function testSearchBannersByFields(): void
//    {
//        Banner::factory()->count(3)->create();
//        // create a model with specific field values
//        $banner = Banner::factory()->create([
//            // 'name' => 'something',
//        ]);
//
//        // search by the above values
//        $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($banner->name))->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('data')
//                    // ->where('data.0.name', $banner->name)
//                    ->etc()
//        );
//    }

    public function testSearchBannersByHashID(): void
    {
        $banners = Banner::factory()->count(3)->create();
        $secondBanner = $banners[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondBanner->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondBanner->getHashedKey())
                    ->etc()
        );
    }
}
