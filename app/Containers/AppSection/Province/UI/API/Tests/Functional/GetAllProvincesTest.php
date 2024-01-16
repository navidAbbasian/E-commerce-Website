<?php

namespace App\Containers\AppSection\Province\UI\API\Tests\Functional;

use App\Containers\AppSection\Province\Models\Province;
use App\Containers\AppSection\Province\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class GetAllProvincesTest.
 *
 * @group province
 * @group api
 */
class GetAllProvincesTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/provinces';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testGetAllProvincesByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        Province::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGetAllProvincesByNonAdmin(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        Province::factory()->count(2)->create();
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
//    public function testSearchProvincesByFields(): void
//    {
//        Province::factory()->count(3)->create();
//        // create a model with specific field values
//        $province = Province::factory()->create([
//            // 'name' => 'something',
//        ]);
//
//        // search by the above values
//        $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($province->name))->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('data')
//                    // ->where('data.0.name', $province->name)
//                    ->etc()
//        );
//    }

    public function testSearchProvincesByHashID(): void
    {
        $provinces = Province::factory()->count(3)->create();
        $secondProvince = $provinces[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondProvince->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondProvince->getHashedKey())
                    ->etc()
        );
    }
}
