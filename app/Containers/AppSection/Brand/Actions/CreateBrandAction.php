<?php

namespace App\Containers\AppSection\Brand\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Brand\Models\Brand;
use App\Containers\AppSection\Brand\Tasks\CreateBrandTask;
use App\Containers\AppSection\Brand\UI\API\Requests\CreateBrandRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateBrandAction extends ParentAction
{
    /**
     * @param CreateBrandRequest $request
     * @return Brand
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateBrandRequest $request): Brand
    {
        $data = $request->sanitizeInput([
            'shop_id',
            'title',
            'meta_title',
            'description',
            'meta_description',
        ]);

        return app(CreateBrandTask::class)->run($data);
    }
}
