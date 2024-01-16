<?php

namespace App\Containers\AppSection\Header\UI\API\Tests\Functional;

use App\Containers\AppSection\Header\Models\Header;
use App\Containers\AppSection\Header\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class GetAllHeadersTest.
 *
 * @group header
 * @group api
 */
class GetAllHeadersTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/headers';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testGetAllHeadersByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        Header::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGetAllHeadersByNonAdmin(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        Header::factory()->count(2)->create();
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
//    public function testSearchHeadersByFields(): void
//    {
//        Header::factory()->count(3)->create();
//        // create a model with specific field values
//        $header = Header::factory()->create([
//            // 'name' => 'something',
//        ]);
//
//        // search by the above values
//        $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($header->name))->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('data')
//                    // ->where('data.0.name', $header->name)
//                    ->etc()
//        );
//    }

    public function testSearchHeadersByHashID(): void
    {
        $headers = Header::factory()->count(3)->create();
        $secondHeader = $headers[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondHeader->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondHeader->getHashedKey())
                    ->etc()
        );
    }
}
