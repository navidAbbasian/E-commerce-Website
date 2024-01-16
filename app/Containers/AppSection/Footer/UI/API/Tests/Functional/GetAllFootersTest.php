<?php

namespace App\Containers\AppSection\Footer\UI\API\Tests\Functional;

use App\Containers\AppSection\Footer\Models\Footer;
use App\Containers\AppSection\Footer\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class GetAllFootersTest.
 *
 * @group footer
 * @group api
 */
class GetAllFootersTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/footers';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testGetAllFootersByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        Footer::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGetAllFootersByNonAdmin(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        Footer::factory()->count(2)->create();
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
//    public function testSearchFootersByFields(): void
//    {
//        Footer::factory()->count(3)->create();
//        // create a model with specific field values
//        $footer = Footer::factory()->create([
//            // 'name' => 'something',
//        ]);
//
//        // search by the above values
//        $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($footer->name))->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('data')
//                    // ->where('data.0.name', $footer->name)
//                    ->etc()
//        );
//    }

    public function testSearchFootersByHashID(): void
    {
        $footers = Footer::factory()->count(3)->create();
        $secondFooter = $footers[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondFooter->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondFooter->getHashedKey())
                    ->etc()
        );
    }
}
