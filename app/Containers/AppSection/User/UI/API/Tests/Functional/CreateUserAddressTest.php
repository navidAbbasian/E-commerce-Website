<?php

namespace App\Containers\AppSection\User\UI\API\Tests\Functional;

use App\Containers\AppSection\User\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class CreateUserAddressTest.
 *
 * @group useraddress
 * @group api
 */
class CreateUserAddressTest extends ApiTestCase
{
    protected string $endpoint = 'post@v1/user-addresses';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    // TODO TEST
    public function testCreateUserAddress(): void
    {
        $data = [
            // 'something' => 'value',
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(201);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.object', 'UserAddress')
                    // ->where('data.something', $data['something'])
                    ->etc()
        );
    }

    // TODO TEST
//    public function testCreateUserAddressWithInvalidFields(): void
//    {
//        $data = [
//            // add some invalid field data here
//            // 'something' => 'invalid',
//        ];
//
//        $response = $this->makeCall($data);
//
//        $response->assertStatus(422);
//        // validate errors and their messages here
//        // $response->assertJson(
//        //     fn (AssertableJson $json) =>
//        //        $json->has('message')
//        //            ->has('errors')
//        //            ->where('errors.something.0', 'Some validation error message.')
//        // );
//    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
//    public function testGivenHaveNoAccess_CannotCreateUserAddress(): void
//    {
//        $this->getTestingUserWithoutAccess();
//
//        $response = $this->makeCall([]);
//
//        $response->assertStatus(403);
//        $response->assertJson(
//            fn (AssertableJson $json) =>
//                $json->has('message')
//                    ->where('message', 'This action is unauthorized.')
//                    ->etc()
//        );
//    }
}
