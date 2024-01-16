<?php

namespace App\Containers\AppSection\Discount\UI\API\Tests\Functional;

use App\Containers\AppSection\Discount\Models\Discount;
use App\Containers\AppSection\Discount\UI\API\Tests\ApiTestCase;
use Hashids;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class FindDiscountByIdTest.
 *
 * @group discount
 * @group api
 */
class FindDiscountByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/discounts/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindDiscount(): void
    {
        $discount = Discount::factory()->create();

        $response = $this->injectId($discount->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', Hashids::encode($discount->id))
                    ->etc()
        );
    }

    public function testFindNonExistingDiscount(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredDiscountResponse(): void
    {
        $discount = Discount::factory()->create();

        $response = $this->injectId($discount->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $discount->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
//    public function testFindDiscountWithRelation(): void
//    {
//        $discount = Discount::factory()->create();
//        $relation = 'roles';
//
//        $response = $this->injectId($discount->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//              $json->has('data')
//                  ->where('data.id', $discount->getHashedKey())
//                  ->count("data.$relation.data", 1)
//                  ->where("data.$relation.data.0.name", 'something')
//                  ->etc()
//        );
//    }
}
