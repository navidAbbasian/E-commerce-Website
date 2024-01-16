<?php

namespace App\Containers\AppSection\User\Actions;

use App\Containers\AppSection\Authorization\Tasks\AssignRolesToUserTask;
use App\Containers\AppSection\Authorization\Tasks\FindRoleTask;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\CreateUserTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Support\Facades\DB;

class CreateUserAction extends ParentAction
{
    public function __construct(
        private readonly CreateUserTask $createUserTask,
        private readonly FindRoleTask $findRoleTask,
        private readonly AssignRolesToUserTask $assignRolesToUserTask
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws \Throwable
     * @throws NotFoundException
     */
    public function run(array $data): User
    {
        return DB::transaction(function () use ($data) {
            $user = $this->createUserTask->run($data);
            $adminRoleName = config('appSection-authorization.admin_role');
            foreach (array_keys(config('auth.guards')) as $guardName) {
                $adminRole = $this->findRoleTask->run($adminRoleName, $guardName);
                $this->assignRolesToUserTask->run($user, $adminRole);
            }
            $user->email_verified_at = now();
            $user->save();

            return $user;
        });
    }
}
