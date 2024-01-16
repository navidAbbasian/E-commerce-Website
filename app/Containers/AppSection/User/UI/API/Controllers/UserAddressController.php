<?php

namespace App\Containers\AppSection\User\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\User\Actions\CreateUserAddressAction;
use App\Containers\AppSection\User\Actions\DeleteUserAddressAction;
use App\Containers\AppSection\User\Actions\FindUserAddressByIdAction;
use App\Containers\AppSection\User\Actions\GetAllUserAddressesAction;
use App\Containers\AppSection\User\Actions\UpdateUserAddressAction;
use App\Containers\AppSection\User\UI\API\Requests\CreateUserAddressRequest;
use App\Containers\AppSection\User\UI\API\Requests\DeleteUserAddressRequest;
use App\Containers\AppSection\User\UI\API\Requests\FindUserAddressByIdRequest;
use App\Containers\AppSection\User\UI\API\Requests\GetAllUserAddressesRequest;
use App\Containers\AppSection\User\UI\API\Requests\UpdateUserAddressRequest;
use App\Containers\AppSection\User\UI\API\Transformers\UserAddressTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class UserAddressController extends ApiController
{
    /**
     * @param CreateUserAddressRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createUserAddress(CreateUserAddressRequest $request): JsonResponse
    {
        $useraddress = app(CreateUserAddressAction::class)->run($request);

        return $this->created($this->transform($useraddress, UserAddressTransformer::class));
    }

    /**
     * @param FindUserAddressByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findUserAddressById(FindUserAddressByIdRequest $request): array
    {
        $useraddress = app(FindUserAddressByIdAction::class)->run($request);

        return $this->transform($useraddress, UserAddressTransformer::class);
    }

    /**
     * @param GetAllUserAddressesRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllUserAddresses(GetAllUserAddressesRequest $request): array
    {
        $useraddresses = app(GetAllUserAddressesAction::class)->run($request);

        return $this->transform($useraddresses, UserAddressTransformer::class);
    }

    /**
     * @param UpdateUserAddressRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateUserAddress(UpdateUserAddressRequest $request): array
    {
        $useraddress = app(UpdateUserAddressAction::class)->run($request);

        return $this->transform($useraddress, UserAddressTransformer::class);
    }

    /**
     * @param DeleteUserAddressRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteUserAddress(DeleteUserAddressRequest $request): JsonResponse
    {
        app(DeleteUserAddressAction::class)->run($request);

        return $this->noContent();
    }
}
