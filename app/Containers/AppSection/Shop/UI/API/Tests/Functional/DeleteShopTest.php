<?php

namespace App\Containers\AppSection\Shop\UI\API\Tests\Functional;

use App\Containers\AppSection\Shop\Models\Shop;
use App\Containers\AppSection\Shop\UI\API\Tests\ApiTestCase;

/**
 * Class DeleteShopTest.
 *
 * @group shop
 * @group api
 */
class DeleteShopTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/shops/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingShop(): void
    {
        $shop = Shop::factory()->create();

        $response = $this->injectId($shop->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingShop(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGivenHaveNoAccess_CannotDeleteShop(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        $shop = Shop::factory()->create();
//
//        $response = $this->injectId($shop->id)->makeCall();
//
//        $response->assertStatus(403);
//    }
}
