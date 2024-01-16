<?php

namespace App\Containers\AppSection\Authorization\Tests\Unit;

use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Containers\AppSection\Authorization\Tests\UnitTestCase;

/**
 * @group authorization
 * @group unit
 */
class CreatePermissionTaskTest extends UnitTestCase
{
    public function testCreatePermission(): void
    {
        $name = 'fuLl_coNtroL';
        $description = 'Gives full control of everything!';
        $display_name = 'CustomerController of All';

        $permission = app(CreatePermissionTask::class)->run($name, $description, $display_name);

        $this->assertEquals(strtolower($name), $permission->name);
        $this->assertEquals($description, $permission->description);
        $this->assertEquals($display_name, $permission->display_name);
        $this->assertEquals('api', $permission->guard_name);
    }
}
