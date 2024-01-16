<?php

namespace App\Containers\AppSection\User\Tests\Unit;

use App\Containers\AppSection\User\Events\UserAddressDeletedEvent;
use App\Containers\AppSection\User\Models\UserAddress;
use App\Containers\AppSection\User\Tasks\DeleteUserAddressTask;
use App\Containers\AppSection\User\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class DeleteUserAddressTaskTest.
 *
 * @group useraddress
 * @group unit
 */
class DeleteUserAddressTaskTest extends UnitTestCase
{
    public function testDeleteUserAddress(): void
    {
        Event::fake();
        $userAddress = UserAddress::factory()->create();

        $result = app(DeleteUserAddressTask::class)->run($userAddress->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(UserAddressDeletedEvent::class);
    }

    public function testDeleteUserAddressWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeleteUserAddressTask::class)->run($noneExistingId);
    }
}
