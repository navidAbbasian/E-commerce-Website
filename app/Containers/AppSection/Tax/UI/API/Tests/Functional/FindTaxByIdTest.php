<?php

namespace App\Containers\AppSection\Tax\UI\API\Tests\Functional;

use App\Containers\AppSection\Tax\Models\Tax;
use App\Containers\AppSection\Tax\UI\API\Tests\ApiTestCase;
use Hashids;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class FindTaxByIdTest.
 *
 * @group tax
 * @group api
 */
class FindTaxByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/taxes/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindTax(): void
    {
        $tax = Tax::factory()->create();

        $response = $this->injectId($tax->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', Hashids::encode($tax->id))
                    ->etc()
        );
    }

    public function testFindNonExistingTax(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredTaxResponse(): void
    {
        $tax = Tax::factory()->create();

        $response = $this->injectId($tax->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $tax->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
//    public function testFindTaxWithRelation(): void
//    {
//        $tax = Tax::factory()->create();
//        $relation = 'roles';
//
//        $response = $this->injectId($tax->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//              $json->has('data')
//                  ->where('data.id', $tax->getHashedKey())
//                  ->count("data.$relation.data", 1)
//                  ->where("data.$relation.data.0.name", 'something')
//                  ->etc()
//        );
//    }
}
