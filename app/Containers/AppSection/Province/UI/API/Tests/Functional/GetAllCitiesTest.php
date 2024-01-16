<?php

namespace App\Containers\AppSection\Province\UI\API\Tests\Functional;

use App\Containers\AppSection\Province\Models\City;
use App\Containers\AppSection\Province\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class GetAllCitiesTest.
 *
 * @group city
 * @group api
 */
class GetAllCitiesTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/cities';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testGetAllCitiesByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        City::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGetAllCitiesByNonAdmin(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        City::factory()->count(2)->create();
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
//    public function testSearchCitiesByFields(): void
//    {
//        City::factory()->count(3)->create();
//        // create a model with specific field values
//        $city = City::factory()->create([
//            // 'name' => 'something',
//        ]);
//
//        // search by the above values
//        $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($city->name))->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('data')
//                    // ->where('data.0.name', $city->name)
//                    ->etc()
//        );
//    }

    public function testSearchCitiesByHashID(): void
    {
        $cities = City::factory()->count(3)->create();
        $secondCity = $cities[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondCity->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondCity->getHashedKey())
                    ->etc()
        );
    }
}
