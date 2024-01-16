<?php

namespace App\Containers\AppSection\Discount\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Discount\Models\Discount;
use App\Containers\AppSection\Discount\Tasks\UpdateDiscountTask;
use App\Containers\AppSection\Discount\UI\API\Requests\UpdateDiscountRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateDiscountAction extends ParentAction
{
    /**
     * @param UpdateDiscountRequest $request
     * @return Discount
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateDiscountRequest $request): Discount
    {
        $data = $request->sanitizeInput([
            // add your request data here
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

        return app(UpdateDiscountTask::class)->run($data, $request->id);
    }
}
