<?php

namespace App\Containers\AppSection\Brand\UI\API\Tests\Functional;

use App\Containers\AppSection\Brand\Models\Brand;
use App\Containers\AppSection\Brand\UI\API\Tests\ApiTestCase;

/**
 * Class DeleteBrandTest.
 *
 * @group brand
 * @group api
 */
class DeleteBrandTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/brands/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingBrand(): void
    {
        $brand = Brand::factory()->create();

        $response = $this->injectId($brand->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingBrand(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGivenHaveNoAccess_CannotDeleteBrand(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        $brand = Brand::factory()->create();
//
//        $response = $this->injectId($brand->id)->makeCall();
//
//        $response->assertStatus(403);
//    }
}
