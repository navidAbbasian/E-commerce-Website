<?php

namespace App\Containers\AppSection\ShoppingList\UI\API\Tests\Functional;

use App\Containers\AppSection\ShoppingList\Models\ShoppingList;
use App\Containers\AppSection\ShoppingList\UI\API\Tests\ApiTestCase;

/**
 * Class DeleteShoppingListTest.
 *
 * @group shoppinglist
 * @group api
 */
class DeleteShoppingListTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/shopping-lists/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingShoppingList(): void
    {
        $shoppingList = ShoppingList::factory()->create();

        $response = $this->injectId($shoppingList->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingShoppingList(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGivenHaveNoAccess_CannotDeleteShoppingList(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        $shoppingList = ShoppingList::factory()->create();
//
//        $response = $this->injectId($shoppingList->id)->makeCall();
//
//        $response->assertStatus(403);
//    }
}
