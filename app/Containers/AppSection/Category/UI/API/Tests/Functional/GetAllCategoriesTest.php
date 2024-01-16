<?php

namespace App\Containers\AppSection\Category\UI\API\Tests\Functional;

use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Category\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class GetAllCategoriesTest.
 *
 * @group category
 * @group api
 */
class GetAllCategoriesTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/categories';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testGetAllCategoriesByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        Category::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGetAllCategoriesByNonAdmin(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        Category::factory()->count(2)->create();
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
//    public function testSearchCategoriesByFields(): void
//    {
//        Category::factory()->count(3)->create();
//        // create a model with specific field values
//        $category = Category::factory()->create([
//            // 'name' => 'something',
//        ]);
//
//        // search by the above values
//        $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($category->name))->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('data')
//                    // ->where('data.0.name', $category->name)
//                    ->etc()
//        );
//    }

    public function testSearchCategoriesByHashID(): void
    {
        $categories = Category::factory()->count(3)->create();
        $secondCategory = $categories[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondCategory->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondCategory->getHashedKey())
                    ->etc()
        );
    }
}
