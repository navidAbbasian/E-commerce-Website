<?php

namespace App\Containers\AppSection\Slider\UI\API\Tests\Functional;

use App\Containers\AppSection\Slider\Models\Slider;
use App\Containers\AppSection\Slider\UI\API\Tests\ApiTestCase;
use Hashids;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class FindSliderByIdTest.
 *
 * @group slider
 * @group api
 */
class FindSliderByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/sliders/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindSlider(): void
    {
        $slider = Slider::factory()->create();

        $response = $this->injectId($slider->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', Hashids::encode($slider->id))
                    ->etc()
        );
    }

    public function testFindNonExistingSlider(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredSliderResponse(): void
    {
        $slider = Slider::factory()->create();

        $response = $this->injectId($slider->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $slider->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
//    public function testFindSliderWithRelation(): void
//    {
//        $slider = Slider::factory()->create();
//        $relation = 'roles';
//
//        $response = $this->injectId($slider->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//              $json->has('data')
//                  ->where('data.id', $slider->getHashedKey())
//                  ->count("data.$relation.data", 1)
//                  ->where("data.$relation.data.0.name", 'something')
//                  ->etc()
//        );
//    }
}
