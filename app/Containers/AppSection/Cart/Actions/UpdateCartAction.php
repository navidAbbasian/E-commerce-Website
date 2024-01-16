<?php

namespace App\Containers\AppSection\Cart\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Cart\Models\Cart;
use App\Containers\AppSection\Cart\Tasks\UpdateCartTask;
use App\Containers\AppSection\Cart\UI\API\Requests\UpdateCartRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateCartAction extends ParentAction
{
    /**
     * @param UpdateCartRequest $request
     * @return Cart
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateCartRequest $request): Cart
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'customer_id',
        ]);

        return app(UpdateCartTask::class)->run($data, $request->id);
    }
}
