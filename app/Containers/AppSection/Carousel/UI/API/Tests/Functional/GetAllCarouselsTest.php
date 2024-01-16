<?php

namespace App\Containers\AppSection\Carousel\UI\API\Tests\Functional;

use App\Containers\AppSection\Carousel\Models\Carousel;
use App\Containers\AppSection\Carousel\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class GetAllCarouselsTest.
 *
 * @group carousel
 * @group api
 */
class GetAllCarouselsTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/carousels';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testGetAllCarouselsByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        Carousel::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGetAllCarouselsByNonAdmin(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        Carousel::factory()->count(2)->create();
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
//    public function testSearchCarouselsByFields(): void
//    {
//        Carousel::factory()->count(3)->create();
//        // create a model with specific field values
//        $carousel = Carousel::factory()->create([
//            // 'name' => 'something',
//        ]);
//
//        // search by the above values
//        $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($carousel->name))->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('data')
//                    // ->where('data.0.name', $carousel->name)
//                    ->etc()
//        );
//    }

    public function testSearchCarouselsByHashID(): void
    {
        $carousels = Carousel::factory()->count(3)->create();
        $secondCarousel = $carousels[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondCarousel->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondCarousel->getHashedKey())
                    ->etc()
        );
    }
}
