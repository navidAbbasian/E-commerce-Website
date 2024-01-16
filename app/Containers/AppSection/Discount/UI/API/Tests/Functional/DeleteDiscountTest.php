<?php

namespace App\Containers\AppSection\Discount\UI\API\Tests\Functional;

use App\Containers\AppSection\Discount\Models\Discount;
use App\Containers\AppSection\Discount\UI\API\Tests\ApiTestCase;

/**
 * Class DeleteDiscountTest.
 *
 * @group discount
 * @group api
 */
class DeleteDiscountTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/discounts/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingDiscount(): void
    {
        $discount = Discount::factory()->create();

        $response = $this->injectId($discount->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingDiscount(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGivenHaveNoAccess_CannotDeleteDiscount(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        $discount = Discount::factory()->create();
//
//        $response = $this->injectId($discount->id)->makeCall();
//
//        $response->assertStatus(403);
//    }
}
