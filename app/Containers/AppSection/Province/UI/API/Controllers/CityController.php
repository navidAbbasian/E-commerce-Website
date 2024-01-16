<?php

namespace App\Containers\AppSection\Province\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Province\Actions\FindCityByIdAction;
use App\Containers\AppSection\Province\Actions\GetAllCitiesAction;
use App\Containers\AppSection\Province\UI\API\Requests\FindCityByIdRequest;
use App\Containers\AppSection\Province\UI\API\Requests\GetAllCitiesRequest;
use App\Containers\AppSection\Province\UI\API\Transformers\CityTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class CityController extends ApiController
{

    /**
     * @param FindCityByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findDomainById(FindCityByIdRequest $request): array
    {
        $domain = app(FindCityByIdAction::class)->run($request);

        return $this->transform($domain, CityTransformer::class);
    }

    /**
     * @param GetAllCitiesRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllCities(GetAllCitiesRequest $request): array
    {
        $domains = app(GetAllCitiesAction::class)->run($request);

        return $this->transform($domains, CityTransformer::class);
    }
}
