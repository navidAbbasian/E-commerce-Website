<?php

namespace App\Containers\AppSection\ShoppingList\UI\API\Tests\Functional;

use App\Containers\AppSection\ShoppingList\Models\ShoppingList;
use App\Containers\AppSection\ShoppingList\UI\API\Tests\ApiTestCase;
use Hashids;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class FindShoppingListByIdTest.
 *
 * @group shoppinglist
 * @group api
 */
class FindShoppingListByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/shopping-lists/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindShoppingList(): void
    {
        $shoppingList = ShoppingList::factory()->create();

        $response = $this->injectId($shoppingList->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', Hashids::encode($shoppingList->id))
                    ->etc()
        );
    }

    public function testFindNonExistingShoppingList(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredShoppingListResponse(): void
    {
        $shoppingList = ShoppingList::factory()->create();

        $response = $this->injectId($shoppingList->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $shoppingList->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
//    public function testFindShoppingListWithRelation(): void
//    {
//        $shoppingList = ShoppingList::factory()->create();
//        $relation = 'roles';
//
//        $response = $this->injectId($shoppingList->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//              $json->has('data')
//                  ->where('data.id', $shoppingList->getHashedKey())
//                  ->count("data.$relation.data", 1)
//                  ->where("data.$relation.data.0.name", 'something')
//                  ->etc()
//        );
//    }
}
