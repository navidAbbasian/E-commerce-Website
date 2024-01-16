<?php

namespace App\Containers\AppSection\Province\UI\API\Tests\Functional;

use App\Containers\AppSection\Province\Models\City;
use App\Containers\AppSection\Province\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class FindCityByIdTest.
 *
 * @group city
 * @group api
 */
class FindCityByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/cities/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindCity(): void
    {
        $city = City::factory()->create();

        $response = $this->injectId($city->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) => $json->has('data')
                    ->where('data.id', \Hashids::encode($city->id))
                    ->etc()
        );
    }

    public function testFindNonExistingCity(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredCityResponse(): void
    {
        $city = City::factory()->create();

        $response = $this->injectId($city->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) => $json->has('data')
                    ->where('data.id', $city->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
    //    public function testFindCityWithRelation(): void
    //    {
    //        $city = City::factory()->create();
    //        $relation = 'roles';
    //
    //        $response = $this->injectId($city->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
    //
    //        $response->assertStatus(200);
    //        $response->assertJson(
    //            fn (AssertableJson $json) =>
    //              $json->has('data')
    //                  ->where('data.id', $city->getHashedKey())
    //                  ->count("data.$relation.data", 1)
    //                  ->where("data.$relation.data.0.name", 'something')
    //                  ->etc()
    //        );
    //    }
}
