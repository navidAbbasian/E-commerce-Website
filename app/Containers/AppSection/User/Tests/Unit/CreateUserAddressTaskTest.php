<?php

namespace App\Containers\AppSection\User\Tests\Unit;

use App\Containers\AppSection\User\Events\UserAddressCreatedEvent;
use App\Containers\AppSection\User\Tasks\CreateUserAddressTask;
use App\Containers\AppSection\User\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * Class CreateUserAddressTaskTest.
 *
 * @group useraddress
 * @group unit
 */
class CreateUserAddressTaskTest extends UnitTestCase
{
    public function testCreateUserAddress(): void
    {
        Event::fake();
        $data = [];

        $userAddress = app(CreateUserAddressTask::class)->run($data);

        $this->assertModelExists($userAddress);
        Event::assertDispatched(UserAddressCreatedEvent::class);
    }

    // TODO TEST
//    public function testCreateUserAddressWithInvalidData(): void
//    {
//        $this->expectException(CreateResourceFailedException::class);
//
//        $data = [
//            // put some invalid data here
//            // 'invalid' => 'data',
//        ];
//
//        app(CreateUserAddressTask::class)->run($data);
//    }
}
