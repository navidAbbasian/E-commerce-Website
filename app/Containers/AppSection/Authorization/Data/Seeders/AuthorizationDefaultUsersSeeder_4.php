<?php

namespace App\Containers\AppSection\Authorization\Data\Seeders;

use App\Containers\AppSection\User\Actions\CreateUserAction;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class AuthorizationDefaultUsersSeeder_4 extends ParentSeeder
{
    public function __construct(
        private readonly CreateUserAction $createAdminAction
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws \Throwable
     */
    public function run(): void
    {
        // Default Users (with their roles) ---------------------------------------------
        $this->createSuperAdmin();
    }

    /**
     * @throws CreateResourceFailedException
     * @throws \Throwable
     */
    private function createSuperAdmin(): void
    {
        $userData = [
            'email' => 'admin@admin.com',
            'password' => 'admin',
            'firstname' => 'Super Admin',
            'lastname' => 'Super Admin',
            'mobile' => '09121234567',
            'gender' => 'male',
            'status' => 'active',

        ];

        $this->createAdminAction->run($userData);
    }
}
