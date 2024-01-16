<?php

namespace App\Containers\AppSection\Slider\UI\API\Tests\Functional;

use App\Containers\AppSection\Slider\Models\Slider;
use App\Containers\AppSection\Slider\UI\API\Tests\ApiTestCase;

/**
 * Class DeleteSliderTest.
 *
 * @group slider
 * @group api
 */
class DeleteSliderTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/sliders/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingSlider(): void
    {
        $slider = Slider::factory()->create();

        $response = $this->injectId($slider->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingSlider(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGivenHaveNoAccess_CannotDeleteSlider(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        $slider = Slider::factory()->create();
//
//        $response = $this->injectId($slider->id)->makeCall();
//
//        $response->assertStatus(403);
//    }
}
