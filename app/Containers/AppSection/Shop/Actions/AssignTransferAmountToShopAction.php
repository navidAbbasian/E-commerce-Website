<?php

namespace App\Containers\AppSection\Shop\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Shop\Tasks\AssignTransferAmountToShopTask;
use App\Containers\AppSection\Shop\UI\API\Requests\AssignTransferAmountToShopRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

class AssignTransferAmountToShopAction extends ParentAction
{
    /**
     * @throws IncorrectIdException
     */
    public function run(AssignTransferAmountToShopRequest $request): mixed
    {
        $data = $request->sanitizeInput([
            'shop_id',
            'province_id',
            'city_id',
            'amount',
        ]);

        return app(AssignTransferAmountToShopTask::class)->run($data);
    }
}
