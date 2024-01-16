<?php

namespace App\Containers\AppSection\VerificationCode\UI\API\Tests\Functional;

use App\Containers\AppSection\VerificationCode\Models\VerificationCode;
use App\Containers\AppSection\VerificationCode\UI\API\Tests\ApiTestCase;

/**
 * Class DeleteVerificationCodeTest.
 *
 * @group verificationcode
 * @group api
 */
class DeleteVerificationCodeTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/verification-codes/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingVerificationCode(): void
    {
        $verificationCode = VerificationCode::factory()->create();

        $response = $this->injectId($verificationCode->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingVerificationCode(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGivenHaveNoAccess_CannotDeleteVerificationCode(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        $verificationCode = VerificationCode::factory()->create();
//
//        $response = $this->injectId($verificationCode->id)->makeCall();
//
//        $response->assertStatus(403);
//    }
}
