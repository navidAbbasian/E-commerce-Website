<?php

namespace App\Containers\AppSection\User\Tests\Unit;

use App\Containers\AppSection\User\Events\UserAddressFoundByIdEvent;
use App\Containers\AppSection\User\Models\UserAddress;
use App\Containers\AppSection\User\Tasks\FindUserAddressByIdTask;
use App\Containers\AppSection\User\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class FindUserAddressByIdTaskTest.
 *
 * @group useraddress
 * @group unit
 */
class FindUserAddressByIdTaskTest extends UnitTestCase
{
    public function testFindUserAddressById(): void
    {
        Event::fake();
        $userAddress = UserAddress::factory()->create();

        $foundUserAddress = app(FindUserAddressByIdTask::class)->run($userAddress->id);

        $this->assertEquals($userAddress->id, $foundUserAddress->id);
        Event::assertDispatched(UserAddressFoundByIdEvent::class);
    }

    public function testFindUserAddressWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindUserAddressByIdTask::class)->run($noneExistingId);
    }
}
