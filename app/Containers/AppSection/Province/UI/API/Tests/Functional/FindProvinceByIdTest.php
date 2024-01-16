<?php

namespace App\Containers\AppSection\Province\UI\API\Tests\Functional;

use App\Containers\AppSection\Province\Models\Province;
use App\Containers\AppSection\Province\UI\API\Tests\ApiTestCase;
use Hashids;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class FindProvinceByIdTest.
 *
 * @group province
 * @group api
 */
class FindProvinceByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/provinces/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindProvince(): void
    {
        $province = Province::factory()->create();

        $response = $this->injectId($province->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', Hashids::encode($province->id))
                    ->etc()
        );
    }

    public function testFindNonExistingProvince(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredProvinceResponse(): void
    {
        $province = Province::factory()->create();

        $response = $this->injectId($province->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $province->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
//    public function testFindProvinceWithRelation(): void
//    {
//        $province = Province::factory()->create();
//        $relation = 'roles';
//
//        $response = $this->injectId($province->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//              $json->has('data')
//                  ->where('data.id', $province->getHashedKey())
//                  ->count("data.$relation.data", 1)
//                  ->where("data.$relation.data.0.name", 'something')
//                  ->etc()
//        );
//    }
}
