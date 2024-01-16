<?php

namespace App\Containers\AppSection\Discount\UI\API\Tests\Functional;

use App\Containers\AppSection\Discount\Models\Discount;
use App\Containers\AppSection\Discount\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class GetAllDiscountsTest.
 *
 * @group discount
 * @group api
 */
class GetAllDiscountsTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/discounts';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testGetAllDiscountsByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        Discount::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGetAllDiscountsByNonAdmin(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        Discount::factory()->count(2)->create();
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
//    public function testSearchDiscountsByFields(): void
//    {
//        Discount::factory()->count(3)->create();
//        // create a model with specific field values
//        $discount = Discount::factory()->create([
//            // 'name' => 'something',
//        ]);
//
//        // search by the above values
//        $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($discount->name))->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('data')
//                    // ->where('data.0.name', $discount->name)
//                    ->etc()
//        );
//    }

    public function testSearchDiscountsByHashID(): void
    {
        $discounts = Discount::factory()->count(3)->create();
        $secondDiscount = $discounts[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondDiscount->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondDiscount->getHashedKey())
                    ->etc()
        );
    }
}
