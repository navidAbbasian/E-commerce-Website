<?php

namespace App\Containers\AppSection\Shop\Actions;

use App\Containers\AppSection\Shop\Models\Shop;
use App\Containers\AppSection\Shop\Tasks\FindShopByIdTask;
use App\Containers\AppSection\Shop\UI\API\Requests\FindShopByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindShopByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindShopByIdRequest $request): Shop
    {
        return app(FindShopByIdTask::class)->run($request->id);
    }
}
