<?php

namespace App\Containers\AppSection\Banner\UI\API\Tests\Functional;

use App\Containers\AppSection\Banner\Models\Banner;
use App\Containers\AppSection\Banner\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class UpdateBannerTest.
 *
 * @group banner
 * @group api
 */
class UpdateBannerTest extends ApiTestCase
{
    protected string $endpoint = 'patch@v1/banners/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    // TODO TEST
    public function testUpdateExistingBanner(): void
    {
        $banner = Banner::factory()->create([
            // 'some_field' => 'new_field_value',
        ]);
        $data = [
            // 'some_field' => 'new_field_value',
        ];

        $response = $this->injectId($banner->id)->makeCall($data);

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.object', 'Banner')
                    ->where('data.id', $banner->getHashedKey())
                    // ->where('data.some_field', $data['some_field'])
                    ->etc()
        );
    }

    public function testUpdateNonExistingBanner(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
//    public function testUpdateExistingBannerWithEmptyValues(): void
//    {
//        $banner = Banner::factory()->create();
//        $data = [
//            // add some fillable fields here
//            // 'first_field' => '',
//            // 'second_field' => '',
//        ];
//
//        $response = $this->injectId($banner->id)->makeCall($data);
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
