<?php

namespace App\Containers\AppSection\Shop\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Shop\Models\Shop;
use App\Containers\AppSection\Shop\Tasks\UpdateShopTask;
use App\Containers\AppSection\Shop\UI\API\Requests\UpdateShopRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateShopAction extends ParentAction
{
    /**
     * @param UpdateShopRequest $request
     * @return Shop
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateShopRequest $request): Shop
    {
        $data = $request->sanitizeInput([
            // add your request data here
            'user_id',
            'title',
            'meta_title',
            'description',
            'meta_description',
            'address',
            'email',
            'area_code',
            'phone',
            'score_worth',
            'status',
        ]);

        return app(UpdateShopTask::class)->run($data, $request->id);
    }
}
