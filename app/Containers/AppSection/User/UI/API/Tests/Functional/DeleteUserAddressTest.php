<?php

namespace App\Containers\AppSection\User\UI\API\Tests\Functional;

use App\Containers\AppSection\User\Models\UserAddress;
use App\Containers\AppSection\User\UI\API\Tests\ApiTestCase;

/**
 * Class DeleteUserAddressTest.
 *
 * @group useraddress
 * @group api
 */
class DeleteUserAddressTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/user-addresses/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingUserAddress(): void
    {
        $userAddress = UserAddress::factory()->create();

        $response = $this->injectId($userAddress->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingUserAddress(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGivenHaveNoAccess_CannotDeleteUserAddress(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        $userAddress = UserAddress::factory()->create();
//
//        $response = $this->injectId($userAddress->id)->makeCall();
//
//        $response->assertStatus(403);
//    }
}
