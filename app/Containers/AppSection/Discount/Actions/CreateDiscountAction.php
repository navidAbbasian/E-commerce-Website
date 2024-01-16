<?php

namespace App\Containers\AppSection\Discount\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Discount\Models\Discount;
use App\Containers\AppSection\Discount\Tasks\CreateDiscountTask;
use App\Containers\AppSection\Discount\UI\API\Requests\CreateDiscountRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateDiscountAction extends ParentAction
{
    /**
     * @param CreateDiscountRequest $request
     * @return Discount
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateDiscountRequest $request): Discount
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'shop_id',
            'customer_id',
            'title',
            'value',
            'started_at',
            'ended_at',
            'min_buy',
            'max_discount',
            'type',
            'is_percent',
            'quantity',
            'remain',
        ]);

        return app(CreateDiscountTask::class)->run($data);
    }
}
