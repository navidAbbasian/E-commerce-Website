<?php

namespace App\Containers\AppSection\User\Tests\Unit;

use App\Containers\AppSection\User\Models\UserAddress;
use App\Containers\AppSection\User\Tests\UnitTestCase;

/**
 * Class UserAddressFactoryTest.
 *
 * @group useraddress
 * @group unit
 */
class UserAddressFactoryTest extends UnitTestCase
{
    public function testCreateUserAddress(): void
    {
        $userAddress = UserAddress::factory()->make();

        $this->assertInstanceOf(UserAddress::class, $userAddress);
    }
}
