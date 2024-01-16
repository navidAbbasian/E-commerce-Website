<?php

namespace App\Containers\AppSection\VerificationCode\UI\API\Tests\Functional;

use App\Containers\AppSection\VerificationCode\Models\VerificationCode;
use App\Containers\AppSection\VerificationCode\UI\API\Tests\ApiTestCase;
use Hashids;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class FindVerificationCodeByIdTest.
 *
 * @group verificationcode
 * @group api
 */
class FindVerificationCodeByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/verification-codes/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindVerificationCode(): void
    {
        $verificationCode = VerificationCode::factory()->create();

        $response = $this->injectId($verificationCode->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', Hashids::encode($verificationCode->id))
                    ->etc()
        );
    }

    public function testFindNonExistingVerificationCode(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredVerificationCodeResponse(): void
    {
        $verificationCode = VerificationCode::factory()->create();

        $response = $this->injectId($verificationCode->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $verificationCode->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
//    public function testFindVerificationCodeWithRelation(): void
//    {
//        $verificationCode = VerificationCode::factory()->create();
//        $relation = 'roles';
//
//        $response = $this->injectId($verificationCode->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//              $json->has('data')
//                  ->where('data.id', $verificationCode->getHashedKey())
//                  ->count("data.$relation.data", 1)
//                  ->where("data.$relation.data.0.name", 'something')
//                  ->etc()
//        );
//    }
}
