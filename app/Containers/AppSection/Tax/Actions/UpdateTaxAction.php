<?php

namespace App\Containers\AppSection\Tax\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Tax\Models\Tax;
use App\Containers\AppSection\Tax\Tasks\UpdateTaxTask;
use App\Containers\AppSection\Tax\UI\API\Requests\UpdateTaxRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateTaxAction extends ParentAction
{
    /**
     * @param UpdateTaxRequest $request
     * @return Tax
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateTaxRequest $request): Tax
    {
        $data = $request->sanitizeInput([
            'title',
            'percent',
        ]);

        return app(UpdateTaxTask::class)->run($data, $request->id);
    }
}
