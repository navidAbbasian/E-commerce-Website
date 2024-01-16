<?php

namespace App\Containers\AppSection\VerificationCode\UI\API\Tests\Functional;

use App\Containers\AppSection\VerificationCode\Models\VerificationCode;
use App\Containers\AppSection\VerificationCode\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class GetAllVerificationCodesTest.
 *
 * @group verificationcode
 * @group api
 */
class GetAllVerificationCodesTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/verification-codes';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testGetAllVerificationCodesByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        VerificationCode::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGetAllVerificationCodesByNonAdmin(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        VerificationCode::factory()->count(2)->create();
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
//    public function testSearchVerificationCodesByFields(): void
//    {
//        VerificationCode::factory()->count(3)->create();
//        // create a model with specific field values
//        $verificationCode = VerificationCode::factory()->create([
//            // 'name' => 'something',
//        ]);
//
//        // search by the above values
//        $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($verificationCode->name))->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('data')
//                    // ->where('data.0.name', $verificationCode->name)
//                    ->etc()
//        );
//    }

    public function testSearchVerificationCodesByHashID(): void
    {
        $verificationcodes = VerificationCode::factory()->count(3)->create();
        $secondVerificationCode = $verificationcodes[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondVerificationCode->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondVerificationCode->getHashedKey())
                    ->etc()
        );
    }
}
