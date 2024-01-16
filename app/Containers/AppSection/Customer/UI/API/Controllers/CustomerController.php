<?php

namespace App\Containers\AppSection\Customer\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Customer\Actions\CreateCustomerAction;
use App\Containers\AppSection\Customer\Actions\DeleteCustomerAction;
use App\Containers\AppSection\Customer\Actions\FindCustomerByIdAction;
use App\Containers\AppSection\Customer\Actions\GetAllCustomersAction;
use App\Containers\AppSection\Customer\Actions\UpdateCustomerAction;
use App\Containers\AppSection\Customer\UI\API\Requests\CreateCustomerRequest;
use App\Containers\AppSection\Customer\UI\API\Requests\DeleteCustomerRequest;
use App\Containers\AppSection\Customer\UI\API\Requests\FindCustomerByIdRequest;
use App\Containers\AppSection\Customer\UI\API\Requests\GetAllCustomersRequest;
use App\Containers\AppSection\Customer\UI\API\Requests\UpdateCustomerRequest;
use App\Containers\AppSection\Customer\UI\API\Transformers\CustomerTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class CustomerController extends ApiController
{
    /**
     * @param CreateCustomerRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createCustomer(CreateCustomerRequest $request): JsonResponse
    {
        $customer = app(CreateCustomerAction::class)->run($request);

        return $this->created($this->transform($customer, CustomerTransformer::class));
    }

    /**
     * @param FindCustomerByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findCustomerById(FindCustomerByIdRequest $request): array
    {
        $customer = app(FindCustomerByIdAction::class)->run($request);

        return $this->transform($customer, CustomerTransformer::class);
    }

    /**
     * @param GetAllCustomersRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllCustomers(GetAllCustomersRequest $request): array
    {
        $customers = app(GetAllCustomersAction::class)->run($request);

        return $this->transform($customers, CustomerTransformer::class);
    }

    /**
     * @param UpdateCustomerRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateCustomer(UpdateCustomerRequest $request): array
    {
        $customer = app(UpdateCustomerAction::class)->run($request);

        return $this->transform($customer, CustomerTransformer::class);
    }

    /**
     * @param DeleteCustomerRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteCustomer(DeleteCustomerRequest $request): JsonResponse
    {
        app(DeleteCustomerAction::class)->run($request);

        return $this->noContent();
    }
}
