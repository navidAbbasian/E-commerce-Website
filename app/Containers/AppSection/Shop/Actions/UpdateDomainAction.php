<?php

namespace App\Containers\AppSection\Shop\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Shop\Models\Domain;
use App\Containers\AppSection\Shop\Tasks\UpdateDomainTask;
use App\Containers\AppSection\Shop\UI\API\Requests\UpdateDomainRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateDomainAction extends ParentAction
{
    /**
     * @param UpdateDomainRequest $request
     * @return Domain
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateDomainRequest $request): Domain
    {
        $data = $request->sanitizeInput([
            'shop_id',
            'domain',
            'is_park',
        ]);

        return app(UpdateDomainTask::class)->run($data, $request->id);
    }
}
