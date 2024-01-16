<?php

namespace App\Containers\AppSection\User\UI\API\Tests\Functional;

use App\Containers\AppSection\User\Models\UserAddress;
use App\Containers\AppSection\User\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class GetAllUserAddressesTest.
 *
 * @group useraddress
 * @group api
 */
class GetAllUserAddressesTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/user-addresses';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testGetAllUserAddressesByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        UserAddress::factory()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGetAllUserAddressesByNonAdmin(): void
//    {
//        $this->getTestingUserWithoutAccess();
//        UserAddress::factory()->count(2)->create();
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
//    public function testSearchUserAddressesByFields(): void
//    {
//        UserAddress::factory()->count(3)->create();
//        // create a model with specific field values
//        $userAddress = UserAddress::factory()->create([
//            // 'name' => 'something',
//        ]);
//
//        // search by the above values
//        $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($userAddress->name))->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('data')
//                    // ->where('data.0.name', $userAddress->name)
//                    ->etc()
//        );
//    }

    public function testSearchUserAddressesByHashID(): void
    {
        $useraddresses = UserAddress::factory()->count(3)->create();
        $secondUserAddress = $useraddresses[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondUserAddress->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondUserAddress->getHashedKey())
                    ->etc()
        );
    }
}
