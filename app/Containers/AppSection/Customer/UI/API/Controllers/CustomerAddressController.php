<?php

namespace App\Containers\AppSection\Customer\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Customer\Actions\CreateCustomerAddressAction;
use App\Containers\AppSection\Customer\Actions\DeleteCustomerAddressAction;
use App\Containers\AppSection\Customer\Actions\FindCustomerAddressByIdAction;
use App\Containers\AppSection\Customer\Actions\GetAllCustomerAddressesAction;
use App\Containers\AppSection\Customer\Actions\UpdateCustomerAddressAction;
use App\Containers\AppSection\Customer\UI\API\Requests\CreateCustomerAddressRequest;
use App\Containers\AppSection\Customer\UI\API\Requests\DeleteCustomerAddressRequest;
use App\Containers\AppSection\Customer\UI\API\Requests\FindCustomerAddressByIdRequest;
use App\Containers\AppSection\Customer\UI\API\Requests\GetAllCustomerAddressesRequest;
use App\Containers\AppSection\Customer\UI\API\Requests\UpdateCustomerAddressRequest;
use App\Containers\AppSection\Customer\UI\API\Transformers\CustomerAddressTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class CustomerAddressController extends ApiController
{
    /**
     * @param CreateCustomerAddressRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createCustomerAddress(CreateCustomerAddressRequest $request): JsonResponse
    {
        $customeraddress = app(CreateCustomerAddressAction::class)->run($request);

        return $this->created($this->transform($customeraddress, CustomerAddressTransformer::class));
    }

    /**
     * @param FindCustomerAddressByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findCustomerAddressById(FindCustomerAddressByIdRequest $request): array
    {
        $customeraddress = app(FindCustomerAddressByIdAction::class)->run($request);

        return $this->transform($customeraddress, CustomerAddressTransformer::class);
    }

    /**
     * @param GetAllCustomerAddressesRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllCustomerAddresses(GetAllCustomerAddressesRequest $request): array
    {
        $customeraddresses = app(GetAllCustomerAddressesAction::class)->run($request);

        return $this->transform($customeraddresses, CustomerAddressTransformer::class);
    }

    /**
     * @param UpdateCustomerAddressRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateCustomerAddress(UpdateCustomerAddressRequest $request): array
    {
        $customeraddress = app(UpdateCustomerAddressAction::class)->run($request);

        return $this->transform($customeraddress, CustomerAddressTransformer::class);
    }

    /**
     * @param DeleteCustomerAddressRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteCustomerAddress(DeleteCustomerAddressRequest $request): JsonResponse
    {
        app(DeleteCustomerAddressAction::class)->run($request);

        return $this->noContent();
    }
}
