<?php

namespace App\Containers\AppSection\Brand\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Brand\Models\Brand;
use App\Containers\AppSection\Brand\Tasks\UpdateBrandTask;
use App\Containers\AppSection\Brand\UI\API\Requests\UpdateBrandRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateBrandAction extends ParentAction
{
    /**
     * @param UpdateBrandRequest $request
     * @return Brand
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateBrandRequest $request): Brand
    {
        $data = $request->sanitizeInput([
            'title',
            'meta_title',
            'description',
            'meta_description',
        ]);

        return app(UpdateBrandTask::class)->run($data, $request->id);
    }
}
