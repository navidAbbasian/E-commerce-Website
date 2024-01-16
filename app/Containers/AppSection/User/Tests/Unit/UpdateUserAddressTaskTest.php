<?php

namespace App\Containers\AppSection\User\Tests\Unit;

use App\Containers\AppSection\User\Events\UserAddressUpdatedEvent;
use App\Containers\AppSection\User\Models\UserAddress;
use App\Containers\AppSection\User\Tasks\UpdateUserAddressTask;
use App\Containers\AppSection\User\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * Class UpdateUserAddressTaskTest.
 *
 * @group useraddress
 * @group unit
 */
class UpdateUserAddressTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateUserAddress(): void
    {
        Event::fake();
        $userAddress = UserAddress::factory()->create();
        $data = [
            // add some fillable fields here
            // 'some_field' => 'new_field_data',
        ];

        $updatedUserAddress = app(UpdateUserAddressTask::class)->run($data, $userAddress->id);

        $this->assertEquals($userAddress->id, $updatedUserAddress->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedUserAddress->some_field);
        Event::assertDispatched(UserAddressUpdatedEvent::class);
    }

    public function testUpdateUserAddressWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdateUserAddressTask::class)->run([], $noneExistingId);
    }
}
