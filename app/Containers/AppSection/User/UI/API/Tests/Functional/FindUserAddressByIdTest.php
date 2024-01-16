<?php

namespace App\Containers\AppSection\User\UI\API\Tests\Functional;

use App\Containers\AppSection\User\Models\UserAddress;
use App\Containers\AppSection\User\UI\API\Tests\ApiTestCase;
use Hashids;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class FindUserAddressByIdTest.
 *
 * @group useraddress
 * @group api
 */
class FindUserAddressByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/user-addresses/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindUserAddress(): void
    {
        $userAddress = UserAddress::factory()->create();

        $response = $this->injectId($userAddress->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', Hashids::encode($userAddress->id))
                    ->etc()
        );
    }

    public function testFindNonExistingUserAddress(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredUserAddressResponse(): void
    {
        $userAddress = UserAddress::factory()->create();

        $response = $this->injectId($userAddress->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $userAddress->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
//    public function testFindUserAddressWithRelation(): void
//    {
//        $userAddress = UserAddress::factory()->create();
//        $relation = 'roles';
//
//        $response = $this->injectId($userAddress->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
//
//        $response->assertStatus(200);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//              $json->has('data')
//                  ->where('data.id', $userAddress->getHashedKey())
//                  ->count("data.$relation.data", 1)
//                  ->where("data.$relation.data.0.name", 'something')
//                  ->etc()
//        );
//    }
}
