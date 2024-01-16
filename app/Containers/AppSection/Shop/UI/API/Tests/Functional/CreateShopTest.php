<?php

namespace App\Containers\AppSection\Shop\UI\API\Tests\Functional;

use App\Containers\AppSection\Shop\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class CreateShopTest.
 *
 * @group shop
 * @group api
 */
class CreateShopTest extends ApiTestCase
{
    protected string $endpoint = 'post@v1/shops';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    // TODO TEST
    public function testCreateShop(): void
    {
        $data = [
            // 'something' => 'value',
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(201);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.object', 'Shop')
                    // ->where('data.something', $data['something'])
                    ->etc()
        );
    }

    // TODO TEST
//    public function testCreateShopWithInvalidFields(): void
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
//    public function testGivenHaveNoAccess_CannotCreateShop(): void
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
