<?php

namespace App\Containers\AppSection\Slider\UI\API\Tests\Functional;

use App\Containers\AppSection\Slider\Models\Slider;
use App\Containers\AppSection\Slider\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class GetAllSlidersTest.
 *
 * @group slider
 * @group api
 */
class GetAllSlidersTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/sliders';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testGetAllSlidersByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        Slider::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGetAllSlidersByNonAdmin(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        Slider::factory()->count(2)->create();
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
//    public function testSearchSlidersByFields(): void
//    {
//        Slider::factory()->count(3)->create();
//        // create a model with specific field values
//        $slider = Slider::factory()->create([
//            // 'name' => 'something',
//        ]);
//
//        // search by the above values
//        $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($slider->name))->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('data')
//                    // ->where('data.0.name', $slider->name)
//                    ->etc()
//        );
//    }

    public function testSearchSlidersByHashID(): void
    {
        $sliders = Slider::factory()->count(3)->create();
        $secondSlider = $sliders[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondSlider->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondSlider->getHashedKey())
                    ->etc()
        );
    }
}
