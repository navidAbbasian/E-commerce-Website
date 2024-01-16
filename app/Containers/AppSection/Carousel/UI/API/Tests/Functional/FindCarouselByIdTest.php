<?php

namespace App\Containers\AppSection\Carousel\UI\API\Tests\Functional;

use App\Containers\AppSection\Carousel\Models\Carousel;
use App\Containers\AppSection\Carousel\UI\API\Tests\ApiTestCase;
use Hashids;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class FindCarouselByIdTest.
 *
 * @group carousel
 * @group api
 */
class FindCarouselByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/carousels/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindCarousel(): void
    {
        $carousel = Carousel::factory()->create();

        $response = $this->injectId($carousel->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', Hashids::encode($carousel->id))
                    ->etc()
        );
    }

    public function testFindNonExistingCarousel(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredCarouselResponse(): void
    {
        $carousel = Carousel::factory()->create();

        $response = $this->injectId($carousel->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $carousel->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
//    public function testFindCarouselWithRelation(): void
//    {
//        $carousel = Carousel::factory()->create();
//        $relation = 'roles';
//
//        $response = $this->injectId($carousel->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//              $json->has('data')
//                  ->where('data.id', $carousel->getHashedKey())
//                  ->count("data.$relation.data", 1)
//                  ->where("data.$relation.data.0.name", 'something')
//                  ->etc()
//        );
//    }
}
