<?php

namespace App\Containers\AppSection\Province\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Province\Actions\FindProvinceByIdAction;
use App\Containers\AppSection\Province\Actions\GetAllProvincesAction;
use App\Containers\AppSection\Province\UI\API\Requests\FindProvinceByIdRequest;
use App\Containers\AppSection\Province\UI\API\Requests\GetAllProvincesRequest;
use App\Containers\AppSection\Province\UI\API\Transformers\ProvinceTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class ProvinceController extends ApiController
{

    /**
     * @param FindProvinceByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findProvinceById(FindProvinceByIdRequest $request): array
    {
        $domain = app(FindProvinceByIdAction::class)->run($request);

        return $this->transform($domain, ProvinceTransformer::class);
    }

    /**
     * @param GetAllProvincesRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllProvinces(GetAllProvincesRequest $request): array
    {
        $domains = app(GetAllProvincesAction::class)->run($request);

        return $this->transform($domains, ProvinceTransformer::class);
    }

}
