<?php

namespace App\Containers\AppSection\Shop\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Shop\Models\Domain;
use App\Containers\AppSection\Shop\Tasks\CreateDomainTask;
use App\Containers\AppSection\Shop\UI\API\Requests\CreateDomainRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateDomainAction extends ParentAction
{
    /**
     * @param CreateDomainRequest $request
     * @return Domain
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateDomainRequest $request): Domain
    {
        $data = $request->sanitizeInput([
            'shop_id',
            'domain',
            'is_park',
        ]);

        return app(CreateDomainTask::class)->run($data);
    }
}
