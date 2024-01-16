<?php

namespace App\Containers\AppSection\ShoppingList\UI\API\Tests\Functional;

use App\Containers\AppSection\ShoppingList\Models\ShoppingList;
use App\Containers\AppSection\ShoppingList\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class UpdateShoppingListTest.
 *
 * @group shoppinglist
 * @group api
 */
class UpdateShoppingListTest extends ApiTestCase
{
    protected string $endpoint = 'patch@v1/shopping-lists/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    // TODO TEST
    public function testUpdateExistingShoppingList(): void
    {
        $shoppingList = ShoppingList::factory()->create([
            // 'some_field' => 'new_field_value',
        ]);
        $data = [
            // 'some_field' => 'new_field_value',
        ];

        $response = $this->injectId($shoppingList->id)->makeCall($data);

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.object', 'ShoppingList')
                    ->where('data.id', $shoppingList->getHashedKey())
                    // ->where('data.some_field', $data['some_field'])
                    ->etc()
        );
    }

    public function testUpdateNonExistingShoppingList(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
//    public function testUpdateExistingShoppingListWithEmptyValues(): void
//    {
//        $shoppingList = ShoppingList::factory()->create();
//        $data = [
//            // add some fillable fields here
//            // 'first_field' => '',
//            // 'second_field' => '',
//        ];
//
//        $response = $this->injectId($shoppingList->id)->makeCall($data);
//
//        $response->assertStatus(422);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//            $json->has('errors')
//                // ->where('errors.first_field.0', 'assert validation errors')
//                // ->where('errors.second_field.0', 'assert validation errors')
//                ->etc()
//        );
//    }
}
