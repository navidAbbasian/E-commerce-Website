<?php

namespace App\Containers\AppSection\Shop\Actions;

use App\Containers\AppSection\Shop\Tasks\RevokeTransferAmountFromShopTask;
use App\Containers\AppSection\Shop\UI\API\Requests\RevokeTransferAmountFromShopRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

class RevokeTransferAmountFromShopAction extends ParentAction
{
    /**
     * @param RevokeTransferAmountFromShopRequest $request
     * @return int
     */
    public function run(RevokeTransferAmountFromShopRequest $request)
    {
        return app(RevokeTransferAmountFromShopTask::class)->run($request->id);
    }
}
