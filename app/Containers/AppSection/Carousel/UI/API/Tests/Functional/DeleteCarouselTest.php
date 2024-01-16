<?php

namespace App\Containers\AppSection\Carousel\UI\API\Tests\Functional;

use App\Containers\AppSection\Carousel\Models\Carousel;
use App\Containers\AppSection\Carousel\UI\API\Tests\ApiTestCase;

/**
 * Class DeleteCarouselTest.
 *
 * @group carousel
 * @group api
 */
class DeleteCarouselTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/carousels/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingCarousel(): void
    {
        $carousel = Carousel::factory()->create();

        $response = $this->injectId($carousel->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingCarousel(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGivenHaveNoAccess_CannotDeleteCarousel(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        $carousel = Carousel::factory()->create();
//
//        $response = $this->injectId($carousel->id)->makeCall();
//
//        $response->assertStatus(403);
//    }
}
