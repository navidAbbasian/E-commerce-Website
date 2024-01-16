<?php

namespace App\Containers\AppSection\Tax\UI\API\Tests\Functional;

use App\Containers\AppSection\Tax\Models\Tax;
use App\Containers\AppSection\Tax\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class GetAllTaxesTest.
 *
 * @group tax
 * @group api
 */
class GetAllTaxesTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/taxes';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testGetAllTaxesByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        Tax::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGetAllTaxesByNonAdmin(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        Tax::factory()->count(2)->create();
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
//    public function testSearchTaxesByFields(): void
//    {
//        Tax::factory()->count(3)->create();
//        // create a model with specific field values
//        $tax = Tax::factory()->create([
//            // 'name' => 'something',
//        ]);
//
//        // search by the above values
//        $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($tax->name))->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('data')
//                    // ->where('data.0.name', $tax->name)
//                    ->etc()
//        );
//    }

    public function testSearchTaxesByHashID(): void
    {
        $taxes = Tax::factory()->count(3)->create();
        $secondTax = $taxes[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondTax->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondTax->getHashedKey())
                    ->etc()
        );
    }
}
