<?php

namespace App\Containers\AppSection\ShoppingList\UI\API\Tests\Functional;

use App\Containers\AppSection\ShoppingList\Models\ShoppingList;
use App\Containers\AppSection\ShoppingList\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class GetAllShoppingListsTest.
 *
 * @group shoppinglist
 * @group api
 */
class GetAllShoppingListsTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/shopping-lists';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testGetAllShoppingListsByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        ShoppingList::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGetAllShoppingListsByNonAdmin(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        ShoppingList::factory()->count(2)->create();
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
//    public function testSearchShoppingListsByFields(): void
//    {
//        ShoppingList::factory()->count(3)->create();
//        // create a model with specific field values
//        $shoppingList = ShoppingList::factory()->create([
//            // 'name' => 'something',
//        ]);
//
//        // search by the above values
//        $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($shoppingList->name))->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('data')
//                    // ->where('data.0.name', $shoppingList->name)
//                    ->etc()
//        );
//    }

    public function testSearchShoppingListsByHashID(): void
    {
        $shoppinglists = ShoppingList::factory()->count(3)->create();
        $secondShoppingList = $shoppinglists[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondShoppingList->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondShoppingList->getHashedKey())
                    ->etc()
        );
    }
}
