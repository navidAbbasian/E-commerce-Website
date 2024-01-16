<?php

namespace App\Containers\AppSection\Category\UI\API\Tests\Functional;

use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Category\UI\API\Tests\ApiTestCase;
use Hashids;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class FindCategoryByIdTest.
 *
 * @group category
 * @group api
 */
class FindCategoryByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/categories/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindCategory(): void
    {
        $category = Category::factory()->create();

        $response = $this->injectId($category->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', Hashids::encode($category->id))
                    ->etc()
        );
    }

    public function testFindNonExistingCategory(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredCategoryResponse(): void
    {
        $category = Category::factory()->create();

        $response = $this->injectId($category->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $category->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
//    public function testFindCategoryWithRelation(): void
//    {
//        $category = Category::factory()->create();
//        $relation = 'roles';
//
//        $response = $this->injectId($category->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//              $json->has('data')
//                  ->where('data.id', $category->getHashedKey())
//                  ->count("data.$relation.data", 1)
//                  ->where("data.$relation.data.0.name", 'something')
//                  ->etc()
//        );
//    }
}
