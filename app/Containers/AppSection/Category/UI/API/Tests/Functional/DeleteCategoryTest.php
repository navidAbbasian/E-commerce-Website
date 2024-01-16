<?php

namespace App\Containers\AppSection\Category\UI\API\Tests\Functional;

use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Category\UI\API\Tests\ApiTestCase;

/**
 * Class DeleteCategoryTest.
 *
 * @group category
 * @group api
 */
class DeleteCategoryTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/categories/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingCategory(): void
    {
        $category = Category::factory()->create();

        $response = $this->injectId($category->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingCategory(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGivenHaveNoAccess_CannotDeleteCategory(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        $category = Category::factory()->create();
//
//        $response = $this->injectId($category->id)->makeCall();
//
//        $response->assertStatus(403);
//    }
}
