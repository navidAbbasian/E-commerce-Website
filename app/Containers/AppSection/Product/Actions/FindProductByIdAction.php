<?php

namespace App\Containers\AppSection\Product\Actions;

use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\Product\Tasks\FindProductByIdTask;
use App\Containers\AppSection\Product\UI\API\Requests\FindProductByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindProductByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindProductByIdRequest $request): Product
    {
        return app(FindProductByIdTask::class)->run($request->id);
    }
}
