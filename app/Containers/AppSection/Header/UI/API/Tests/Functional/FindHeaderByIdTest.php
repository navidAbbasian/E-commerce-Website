<?php

namespace App\Containers\AppSection\Header\UI\API\Tests\Functional;

use App\Containers\AppSection\Header\Models\Header;
use App\Containers\AppSection\Header\UI\API\Tests\ApiTestCase;
use Hashids;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class FindHeaderByIdTest.
 *
 * @group header
 * @group api
 */
class FindHeaderByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/headers/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindHeader(): void
    {
        $header = Header::factory()->create();

        $response = $this->injectId($header->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', Hashids::encode($header->id))
                    ->etc()
        );
    }

    public function testFindNonExistingHeader(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredHeaderResponse(): void
    {
        $header = Header::factory()->create();

        $response = $this->injectId($header->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $header->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
//    public function testFindHeaderWithRelation(): void
//    {
//        $header = Header::factory()->create();
//        $relation = 'roles';
//
//        $response = $this->injectId($header->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//              $json->has('data')
//                  ->where('data.id', $header->getHashedKey())
//                  ->count("data.$relation.data", 1)
//                  ->where("data.$relation.data.0.name", 'something')
//                  ->etc()
//        );
//    }
}
