<?php

namespace App\Containers\AppSection\Tax\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Tax\Models\Tax;
use App\Containers\AppSection\Tax\Tasks\CreateTaxTask;
use App\Containers\AppSection\Tax\UI\API\Requests\CreateTaxRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateTaxAction extends ParentAction
{
    /**
     * @param CreateTaxRequest $request
     * @return Tax
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateTaxRequest $request): Tax
    {
        $data = $request->sanitizeInput([
            'shop_id',
            'title',
            'percent',
        ]);

        return app(CreateTaxTask::class)->run($data);
    }
}
