<?php

namespace App\Containers\AppSection\User\Tests\Unit;

use App\Containers\AppSection\User\Events\UserAddressesListedEvent;
use App\Containers\AppSection\User\Models\UserAddress;
use App\Containers\AppSection\User\Tasks\GetAllUserAddressesTask;
use App\Containers\AppSection\User\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * Class GetAllUserAddressesTaskTest.
 *
 * @group useraddress
 * @group unit
 */
class GetAllUserAddressesTaskTest extends UnitTestCase
{
    public function testGetAllUserAddresses(): void
    {
        Event::fake();
        UserAddress::factory()->count(3)->create();

        $foundUserAddresses = app(GetAllUserAddressesTask::class)->run();

        $this->assertCount(3, $foundUserAddresses);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundUserAddresses);
        Event::assertDispatched(UserAddressesListedEvent::class);
    }
}
